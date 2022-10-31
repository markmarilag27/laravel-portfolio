import { Construct } from 'constructs'
import { SqsEventSource } from 'aws-cdk-lib/aws-lambda-event-sources'
import * as path from 'path'
import * as cdk from 'aws-cdk-lib'
import * as lambda from 'aws-cdk-lib/aws-lambda'
import * as apiGateway from 'aws-cdk-lib/aws-apigateway'
import * as dynamodb from 'aws-cdk-lib/aws-dynamodb'
import * as s3 from 'aws-cdk-lib/aws-s3'
import * as s3Deploy from 'aws-cdk-lib/aws-s3-deployment'
import * as origins from 'aws-cdk-lib/aws-cloudfront-origins'
import * as cloudfront from 'aws-cdk-lib/aws-cloudfront'
import * as sqs from 'aws-cdk-lib/aws-sqs'

export class LaravelPortfolioStack extends cdk.Stack {
  constructor(scope: Construct, id: string, props?: cdk.StackProps) {
    super(scope, id, props);

    const srcPath = path.join('src')

    const dynamoTable = new dynamodb.Table(this, 'dynamodb', {
      billingMode: dynamodb.BillingMode.PAY_PER_REQUEST,
      removalPolicy: cdk.RemovalPolicy.DESTROY,
      partitionKey: { name: 'id', type: dynamodb.AttributeType.STRING },
      timeToLiveAttribute: 'ttl',
    })

    const dynamodbActions = [
      'dynamodb:DescribeTable',
      'dynamodb:Query',
      'dynamodb:Scan',
      'dynamodb:GetItem',
      'dynamodb:PutItem',
      'dynamodb:UpdateItem',
      'dynamodb:DeleteItem'
    ]

    const bucket = new s3.Bucket(this, 'bucket', {
      bucketName: 'laravel-portfolio-bucket',
      removalPolicy: cdk.RemovalPolicy.DESTROY,
      publicReadAccess: false,
      cors: [
        {
          allowedMethods: [
            s3.HttpMethods.GET,
            s3.HttpMethods.POST,
            s3.HttpMethods.DELETE,
            s3.HttpMethods.HEAD,
            s3.HttpMethods.PUT
          ],
          allowedOrigins: ['*'],
          allowedHeaders: ['*'],
          exposedHeaders: [
            'Access-Control-Allow-Origin',
            'x-amz-server-side-encryption',
            'x-amz-request-id',
            'x-amz-id-2'
          ],
          maxAge: 3000
        }
      ]
    })

    const distribution = new cloudfront.Distribution(this, 'cdn', {
      defaultBehavior: {
        origin: new origins.S3Origin(bucket)
      },
    })

    new s3Deploy.BucketDeployment(this, 'deploy-front-end-static-assets', {
      sources: [s3Deploy.Source.asset(`${srcPath}/public`)],
      destinationBucket: bucket,
      destinationKeyPrefix: 'static-assets',
      distribution,
      distributionPaths: ['/*'],
      prune: true
    })

    const deadLetterQueue = new sqs.Queue(this, 'sqs-dlq', {
      removalPolicy: cdk.RemovalPolicy.DESTROY,
      retentionPeriod: cdk.Duration.minutes(30),
      fifo: true
    })

    const queue = new sqs.Queue(this, 'sqs-queue', {
      removalPolicy: cdk.RemovalPolicy.DESTROY,
      fifo: true,
      deadLetterQueue: {
        queue: deadLetterQueue,
        maxReceiveCount: 1
      }
    })

    const env = {
      ASSET_URL: `https://${distribution.domainName}/static-assets`,
      AWS_BUCKET: bucket.bucketName,
      DYNAMODB_CACHE_TABLE: dynamoTable.tableName,
      SQS_PREFIX: queue.queueUrl,
      SQS_QUEUE: queue.queueName,
    }

    const restApiLambdaFunction = new lambda.DockerImageFunction(this, 'lambda-function-rest-api', {
      functionName: 'laravel-portfolio-rest-api',
      code: lambda.DockerImageCode.fromImageAsset(srcPath, { cmd: ['public/index.php'] }),
      timeout: cdk.Duration.seconds(28),
      memorySize: 1024,
      environment: env,
    })

    const sqsTriggerLambdaFunction = new lambda.DockerImageFunction(this, 'lambda-function-sqs-trigger', {
      functionName: 'laravel-portfolio-sqs-trigger',
      code: lambda.DockerImageCode.fromImageAsset(srcPath, { cmd: ['worker.php']}),
      timeout: cdk.Duration.seconds(28),
      memorySize: 512,
      environment: env,
    })

    sqsTriggerLambdaFunction.addEventSource(new SqsEventSource(queue, { batchSize: 1 }))
    dynamoTable.grant(restApiLambdaFunction, ...dynamodbActions)

    const apiV1 = new apiGateway.RestApi(this, 'api-gateway', {
      endpointTypes: [apiGateway.EndpointType.EDGE]
    })

    const restApiLambdaIntegration = new apiGateway.LambdaIntegration(restApiLambdaFunction, {
      proxy: true
    })

    apiV1.root.addMethod('ANY', restApiLambdaIntegration)

    const apiGatewayResourceProxy = apiV1.root.addResource('{proxy+}')
    apiGatewayResourceProxy.addMethod('ANY', restApiLambdaIntegration)
  }
}
