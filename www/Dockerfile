FROM php:7.2.2-apache

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
RUN docker-php-ext-install pdo  mbstring

RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs
RUN npm install

# configure apache

# Enable apache modules
RUN a2enmod rewrite headers ssl

RUN service apache2 restart

EXPOSE 80
EXPOSE 443
