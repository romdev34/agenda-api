#!/bin/sh
(>&2 echo "[*] Bootstrap SYMFONY for production")
> /etc/nginx/conf.d/default.conf
cat /docker/nginx_prod >> /etc/nginx/conf.d/default.conf
composer install --no-dev --optimize-autoloader \
&& bin/console c:c \
&& bin/console doctrine:migrations:migrate
