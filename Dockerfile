FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libonig-dev libxml2-dev cron \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

RUN chown -R www-data:www-data /var/www

COPY .docker/cron/laravel_cron /etc/cron.d/laravel_cron
RUN chmod 0644 /etc/cron.d/laravel_cron && crontab /etc/cron.d/laravel_cron

CMD service cron start && php-fpm
