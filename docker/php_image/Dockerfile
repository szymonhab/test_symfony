FROM php:7.0-apache
MAINTAINER Szymon Habela <szymonhab@gmail.com>

COPY php.ini /usr/local/etc/php/
RUN docker-php-ext-install pdo pdo_mysql mbstring
ADD test_symfony.local.conf /etc/apache2/sites-available/
RUN a2ensite dmdocker.local && a2enmod expires rewrite
#RUN chown -R www-data:www-data /projects/testdocker
