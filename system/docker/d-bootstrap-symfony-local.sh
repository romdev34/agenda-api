#!/bin/sh
 (>&2 echo "[*] Bootstrap SYMFONY for local env")
 > /etc/nginx/conf.d/default.conf
 cat /docker/nginx_local >> /etc/nginx/conf.d/default.conf
composer install \
&& bin/console doctrine:migrations:migrate