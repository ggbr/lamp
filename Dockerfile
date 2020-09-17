FROM php:7.2.25-apache

RUN apt-get upgrade -y
RUN apt-get -y update --fix-missing


# Other PHP7 Extensions
RUN apt-get update -y && \
    apt-get install -y libmcrypt-dev && \
    pecl install mcrypt-1.0.1 && \
    docker-php-ext-enable mcrypt

RUN apt-get -y install zlib1g-dev
RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo  mbstring mysqli pdo pdo_mysql

RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs
RUN npm install

COPY . /var/www/html

COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./default.conf /etc/apache2/sites-enabled/000-default.conf
# configure apache
WORKDIR /var/www/html
# Enable apache modules
RUN composer dump-autoload
RUN chmod 777 -R ./storage/
RUN a2enmod rewrite headers ssl

RUN service apache2 restart


EXPOSE 80