#!/usr/bin/env node
import 'source-map-support/register';
import * as cdk from 'aws-cdk-lib';
import { LaravelPortfolioStack } from '../lib/laravel-portfolio-stack';

const app = new cdk.App();
new LaravelPortfolioStack(app, 'LaravelPortfolioStack', {
  env: {
    account: process.env.CDK_DEFAULT_ACCOUNT,
    region: process.env.CDK_DEFAULT_REGION,
  },
});
