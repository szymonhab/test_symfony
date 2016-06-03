FROM php:7.0-apache
MAINTAINER Szymon Habela <szymonhab@gmail.com>

COPY php.ini /usr/local/etc/php/
RUN docker-php-ext-install pdo pdo_mysql mbstring opcache
ADD test_symfony.local.conf /etc/apache2/sites-available/
RUN a2ensite test_symfony.local && a2enmod expires rewrite
RUN mkdir -m 777 /projects
#RUN chown -R www-data:www-data /projects/testdocker
