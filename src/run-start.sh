#!/usr/bin/env bash

dynamodb="
aws dynamodb \
--endpoint-url http://dynamodb:8002 \
create-table --table-name laravel_cache \
--attribute-definitions AttributeName=id,AttributeType=S \
--key-schema AttributeName=id,KeyType=HASH \
--provisioned-throughput ReadCapacityUnits=3,WriteCapacityUnits=3 \
--region ${AWS_DEFAULT_REGION:-ap-southeast-1}
"

mc="
mc alias set client http://minio:9000 ${AWS_ACCESS_KEY_ID:-laravel} ${AWS_SECRET_ACCESS_KEY:-password};
mc mb client/${AWS_BUCKET:-local-bucket};
mc policy set public client/${AWS_BUCKET:-local-bucket};
"

artisan="
composer install
php artisan migrate
"

docker compose up -d
docker compose exec -u laravel app bash -c "$dynamodb"
docker compose exec -u laravel app bash -c "$mc"
docker compose exec -u laravel app bash -c "$artisan"
