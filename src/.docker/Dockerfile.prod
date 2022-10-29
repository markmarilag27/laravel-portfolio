FROM bref/php-81-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ca-certificates.crt /opt/certificate.crt
COPY . /var/task
COPY .env.backup /var/task/.env

RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --prefer-dist

RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan migrate --force

RUN rm -v /var/task/.env
COPY .env.aws /var/task/.env
