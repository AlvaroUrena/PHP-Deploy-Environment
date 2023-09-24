#Put the php version that you want (php:x.x.x-apache).
#More info https://hub.docker.com/_/php
FROM php:8.2.10-apache
RUN apt-get update && apt-get install -y libldap2-dev
RUN docker-php-ext-install pdo_mysql ldap
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN a2enmod rewrite