 FROM php:7.2-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY config/php.ini /usr/local/etc/php/
EXPOSE 80



