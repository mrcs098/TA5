FROM php:8.5-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev libzip-dev libsqlite3-dev unzip \
    && docker-php-ext-install mbstring pdo_sqlite zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

RUN mkdir -p bootstrap/cache storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs storage/app/private storage/app/public \
    && composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist \
    && chown -R www-data:www-data storage bootstrap/cache

ENV APP_ENV=production APP_DEBUG=false SESSION_DRIVER=file CACHE_STORE=file LOG_CHANNEL=stderr PORT=10000
EXPOSE 10000
CMD ["sh", "docker/start.sh"]
