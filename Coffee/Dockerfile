FROM php:8.0-apache
RUN apt-get update
RUN apt-get -y install libaprutil1-dbd-mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && a2enmod authn_dbd
EXPOSE 80