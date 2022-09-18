FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update -y && apt-get install -y sendmail libpng-dev
RUN docker-php-ext-install gd
EXPOSE 80