FROM ubi8/php-74

LABEL maintainer="Andre Amorim"

COPY www0.conf /etc/php-fpm.d/www0.conf
COPY site.conf /etc/httpd/conf.d/site.conf

USER root

RUN mkdir -p /run/php-fpm/ && \
    mkdir -p /opt/app-root/src/storage/ && \
    chgrp -R 0 /var/log/httpd /var/run/httpd /run/php-fpm && \
    chmod -R g=u /var/log/httpd /var/run/httpd /run/php-fpm && \
    chmod -R g=u /opt/app-root/src/storage/

USER 1001

CMD php-fpm & httpd -D FOREGROUND