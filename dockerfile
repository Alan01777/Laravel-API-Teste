FROM composer:lts AS build

WORKDIR /var/www

COPY composer.lock composer.json /var/www/

RUN composer install --no-dev --no-scripts --no-autoloader

FROM php:8.3-fpm-alpine AS runner

WORKDIR /var/www

COPY --from=build /var/www/vendor /var/www/vendor

# Copy application files
COPY . /var/www

# Install dependencies and clean up in the same layer
RUN apk add --no-cache \
    libpng-dev \
    libzip-dev \
    postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql zip && \
    rm -rf /var/cache/apk/* && \
    addgroup -g 1000 www-data && \
    adduser -u 1000 -S www-data -G www-data && \
    chown -R www:www /var/www

USER www-data

EXPOSE 9000
CMD ["php-fpm", "-R"]
