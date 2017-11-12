#!/bin/bash

# Make sure we're not confused by old, incompletely-shutdown httpd
# context after restarting the container.  httpd won't start correctly
# if it thinks it is already running.
rm -rf /run/httpd/*

sleep 33

php /var/www/application/artisan migrate

chmod 777 /var/www/application/storage -Rf

exec /usr/sbin/apachectl -D FOREGROUND
