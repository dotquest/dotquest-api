FROM ubi8/php-74

LABEL maintainer="Andre Amorim"

ARG WWWGROUP

WORKDIR /var/www/html

ENV TZ=UTC

USER root

RUN yum update && \
    yum install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm && \
    yum install -y epel-release supervisor

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini /etc/php/7.4/cli/conf.d/99-sail.ini
RUN chmod +x /usr/local/bin/start-container

EXPOSE 8000

ENTRYPOINT ["start-container"]
