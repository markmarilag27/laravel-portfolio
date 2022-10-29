#!/usr/bin/env bash

artisan="
./vendor/bin/pint
./vendor/bin/psalm --no-cache
php artisan test
"
docker compose exec -u laravel app bash -c "$artisan"
