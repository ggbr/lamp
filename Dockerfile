#
# PHP Setup
#

FROM php:8.0.3-cli

#
# Install dependencies
#

RUN set -xe; \
    apt-get update && \
    apt-get install -y \
        curl \
        git \
        zip \
        zlib1g-dev \
        libzip-dev \
        libicu-dev && \
    pecl install \
        swoole && \
    docker-php-ext-install \
        zip \
        pcntl \
        intl && \
    docker-php-ext-enable \
        swoole && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* \
           /tmp/* \
           /var/tmp/* \
           /var/log/lastlog \
           /var/log/faillog

#
# Workspace User
#

ARG APP_USER_ID=1000
ARG APP_GROUP_ID=1000

RUN set -xe; \
    groupadd -f workspace && \
    groupmod -g ${APP_GROUP_ID} workspace && \
    useradd workspace -g workspace && \
    mkdir -p /home/workspace && chmod 755 /home/workspace && chown workspace:workspace /home/workspace && \
    usermod -u ${APP_USER_ID} -m -d /home/workspace workspace -s $(which bash) && \
    chown -R workspace:workspace /var/www/html

#
# Set Timezone
#


#
# Composer Setup
#
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
ARG COMPOSER_VERSION=2.0.12
ARG COMPOSER_REPO_PACKAGIST='https://packagist.com.br'

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION} && \
    composer config -g repos.packagist composer ${COMPOSER_REPO_PACKAGIST}
    
RUN  apt update && apt upgrade -y 
RUN  apt update && apt install -y nodejs && apt install npm -y

 RUN  npm cache clean -f && npm install -g n && n stable

COPY . /var/www/html
WORKDIR /var/www/html

