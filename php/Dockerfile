FROM php:7.1-apache
MAINTAINER Gabriel Sousa ggbr12.neg@gmail.com

COPY php.ini /usr/local/etc/php/
RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng12-dev libmcrypt-dev \
  && docker-php-ext-install pdo_mysql mysqli gd iconv 
COPY ./cargoviewer.com.br.conf  /etc/apache2/sites-available/
COPY ./hosts  /etc/hosts
RUN a2enmod rewrite 

RUN service apache2 restart
WORKDIR /etc/apache2/sites-available/
RUN a2ensite cargoviewer.com.br.conf 


