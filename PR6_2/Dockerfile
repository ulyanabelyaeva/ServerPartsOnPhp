FROM php:8.1-apache
RUN apt-get update
RUN apt-get -y install apache2-utils

RUN apt-get install -y git && \
    apt-get install -y libpng-dev && \
    apt-get install -y zip unzip && \
    docker-php-ext-install gd

EXPOSE 80