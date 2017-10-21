FROM mysql:5.6
COPY ./my.cnf /etc/mysql/conf.d/
MAINTAINER Gabriel Sousa ggbr12.neg@gmail.com

ENV MYSQL_DATABASE=web \
    MYSQL_ROOT_PASSWORD=root

ADD ./test.sql /docker-entrypoint-initdb.d

EXPOSE 3306
