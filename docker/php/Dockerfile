FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git

RUN apt-get update && \
    apt-get install -y libicu-dev && \
    docker-php-ext-install intl \
    && php -m | grep intl

RUN apt-get update && \
    apt-get install -y libxml2-dev && \
    docker-php-ext-install xml simplexml dom \
    && php -m | grep xml

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install json

# copy custom ini file
ADD php.ini /usr/local/etc/php/php.ini

EXPOSE 9000
