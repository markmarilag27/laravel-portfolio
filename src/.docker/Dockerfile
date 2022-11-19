FROM ubuntu:22.04

LABEL maintainer="Mark Marilag <mark.marilag27@gmail.com>"

ENV AWS_ACCESS_KEY_ID=${AWS_ACCESS_KEY_ID:-laravel}
ENV AWS_SECRET_ACCESS_KEY=${AWS_SECRET_ACCESS_KEY:-password}
ENV AWS_REGION=${AWS_DEFAULT_REGION:-ap-southeast-1}

ARG NODE_VERSION=18
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && \
    apt-get install -y \
    gnupg \
    gosu \
    curl \
    ca-certificates \
    zip \
    unzip \
    supervisor \
    cron \
    libcap2-bin \
    libpng-dev \
    python2 \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    debian-keyring \
    debian-archive-keyring \
    apt-transport-https

RUN mkdir -p ~/.gnupg && \
    chmod 600 ~/.gnupg && \
    echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf && \
    apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys E5267A6C && \
    apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C300EE8C && \
    echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu hirsute main" > /etc/apt/sources.list.d/ppa_ondrej_php.list && \
    curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/gpg.key' | gpg --dearmor -o /usr/share/keyrings/caddy-stable-archive-keyring.gpg && \
    curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/debian.deb.txt' | tee /etc/apt/sources.list.d/caddy-stable.list

RUN apt-get update && apt-get install -y \
    nginx \
    php8.1 \
    php8.1-cli \
    php8.1-fpm \
    php8.1-gd \
    php8.1-curl \
    php8.1-imap \
    php8.1-mysql \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-zip \
    php8.1-bcmath \
    php8.1-soap \
    php8.1-intl \
    php8.1-readline \
    php8.1-ldap \
    php8.1-msgpack \
    php8.1-igbinary \
    php8.1-redis \
    php8.1-pcov \
    php8.1-xdebug \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /usr/share/keyrings/yarn.gpg >/dev/null \
    && echo "deb [signed-by=/usr/share/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y yarn \
    && apt-get install -y mysql-client

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=amazon/aws-cli /usr/local/aws-cli/ /usr/local/aws-cli/
COPY --from=minio/mc:latest /usr/bin/mc /usr/bin/mc
RUN ln -s /usr/local/aws-cli/v2/current/bin/aws /usr/local/bin/

RUN apt-get -y autoremove && \
    apt-get -y clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN groupadd --force -g 1000 laravel
RUN useradd -ms /bin/bash --no-user-group -g 1000 -u 1000 laravel

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY fpm-pool.conf /etc/php/8.1/fpm/pool.d/www.conf
COPY php.ini /etc/php/8.1/fpm/conf.d/99-php.ini
COPY xdebug.ini /etc/php/8.1/cli/conf.d/20-xdebug.ini

RUN mkdir -p /var/www/html && \
    mkdir -p /var/log/php && \
    mkdir -p /var/log/supervisor && \
    mkdir -p /tmp/laravel/storage/framework/views

RUN chown -R laravel:laravel /var/www/html && \
    chown -R laravel:laravel /run && \
    chown -R laravel:laravel /var/lib/nginx && \
    chown -R laravel:laravel /var/log/nginx && \
    chown -R laravel:laravel /var/log/php && \
    chown -R laravel:laravel /tmp/laravel/storage/framework/views

WORKDIR /var/www/html

EXPOSE 80

CMD [ "/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf" ]

