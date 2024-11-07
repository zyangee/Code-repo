FROM php:8.0-apache
COPY . /var/www/html/
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y libpg-dev \
    && docker-php-ext-install pdo pdo_pgsql
RUN a2enmod rewrite
EXPOSE 80
