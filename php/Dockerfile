FROM ubuntu:16.04

MAINTAINER Hoang Nguyen <nbhoangit@gmail.com>

RUN apt-get update -y && \
	apt-get install -y \
	apache2 && \
	apt-get clean && \
	rm -rf \var\lib\lists\*

RUN a2enmod rewrite

RUN /usr/sbin/a2ensite default-ssl
RUN /usr/sbin/a2enmod ssl

RUN apt-get update -y && \
	apt-get install php7.0 libapache2-mod-php7.0 vim -y && \
	apt-get clean && \
	rm -rf \var\lib\lists\*

RUN apt-get install -y php7.0-json php7.0-xml php7.0-pdo php7.0-mbstring \
	php7.0-tokenizer
