FROM corebiz/docker-php

COPY . /var/www/html

COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./default.conf /etc/apache2/sites-enabled/000-default.conf
# configure apache
WORKDIR /var/www/html
# Enable apache modules
RUN a2enmod rewrite headers ssl

RUN service apache2 restart


EXPOSE 80
