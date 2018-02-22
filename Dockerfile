FROM php:7.2-cli-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1

COPY . /usr/src/hansexport
WORKDIR /usr/src/hansexport

RUN apk update && \
    apk add git zlib-dev zip unzip && \
    docker-php-ext-install zip && \
    rm -rf /usr/src/php && \
    rm -rf /var/cache/apk/*

RUN echo "memory_limit=1024M" > /usr/local/etc/php/conf.d/memory-limit.ini && \
    curl --silent --show-error https://getcomposer.org/installer | php && \
    php composer.phar install --prefer-dist --no-progress --no-suggest --optimize-autoloader --classmap-authoritative  --no-interaction && \
    php composer.phar clear-cache

CMD ["php", "./bin/console", "app:import"]
