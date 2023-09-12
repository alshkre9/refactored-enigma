FROM alpine

FROM php:8.2-apache

COPY ./../ /var/www/html

RUN a2enmod rewrite 
RUN service apache2 restart
RUN apt-get update -y && apt-get upgrade -y
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN docker-php-ext-install pdo pdo_mysql
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
WORKDIR /usr/local/etc/php
RUN mv php.ini-development php.ini
WORKDIR /var/www/html

# RUN php bin/cli-app.php orm:schema-tool:create

EXPOSE 80