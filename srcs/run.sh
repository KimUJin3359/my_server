#!/bin/bash

# run mysql, openssl, php7.3-fpm
service mysql start
service php7.3-fpm start
nginx -g 'daemon off;'
