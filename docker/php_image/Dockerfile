FROM php:7.0-apache
MAINTAINER Szymon Habela <szymonhab@gmail.com>

RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++ && apt-get install -y wget
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql mbstring opcache intl
ADD test_symfony.local.conf /etc/apache2/sites-available/
RUN a2ensite test_symfony.local && a2enmod expires rewrite
RUN mkdir -m 777 /projects

RUN wget https://phar.phpunit.de/phpunit.phar
RUN chmod +x phpunit.phar
RUN mv phpunit.phar /usr/local/bin/phpunit

COPY php.ini /usr/local/etc/php/php.ini
WORKDIR /projects
