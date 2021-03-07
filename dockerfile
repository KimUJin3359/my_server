#container OS debian buster
FROM debian:buster

# SUBJECT
# web server with Nignx
# services : WordPress, phpMyAdmin, MySQL
# use SSL protocol
# can redirecting
# autoindex On/Off

# wget is a program that road from web server for phpMyAdmin, WordPress
# openssl is an open source SSL
# php7.3 is a newer version
# apt-cache search php7.3 -> show php7.3 modules list
# fpm for server-side
# mbstring for MBSTRING module(2bytes char)
# debian only uses a mariadb(included mysql)
RUN apt-get update && apt-get install -y \
	    nginx \
	    wget \
	    vim	\
	    openssl \
	    php7.3 \
	    php7.3-fpm \
	    php7.3-mysql \
	    php7.3-mbstring \
	    php7.3-cli \
	    mariadb-server \
	    unzip

# /var/www/html -> when we require an access, web server will find in this directory

# install wordpress
# tar.gz is .tar archieve	    
RUN wget https://wordpress.org/latest.tar.gz
RUN tar -xf latest.tar.gz
RUN mv wordpress /var/www/html/
RUN rm -rf latest.tar.gz

# install phpMyAdmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.zip
RUN unzip phpMyAdmin-5.0.2-all-languages.zip
RUN mv phpMyAdmin-5.0.2-all-languages phpmyadmin
RUN mv phpmyadmin /var/www/html/
RUN rm -rf phpMyAdmin-5.0.2-all-languages.zip

# setting Environment
# wordpress - https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-with-lemp-nginx-mariadb-and-php-on-debian-10
# phpmyadmin - https://www.digitalocean.com/community/tutorials/how-to-install-phpmyadmin-from-source-debian-10
COPY ./srcs/config.inc.php /var/www/html/phpmyadmin/config.inc.php
COPY ./srcs/wp-config.php /var/www/html/wordpress/wp-config.php
COPY ./srcs/default /etc/nginx/sites-available/default

# setting ssl
# req certification require & make
# -subj if didn't insert, acquire to user's input
# openssl - https://www.digitalocean.com/community/tutorials/how-to-create-a-self-signed-ssl-certificate-for-nginx-in-ubuntu-18-04
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt -subj "/C=KR/ST=Seoul/O=42seoul"
# while using OpenSSl, create a Diffie_hellman group, used in secrecy with clients
RUN openssl dhparam -out /etc/nginx/dhparam.pem 1024
COPY ./srcs/self-signed.conf /etc/nginx/snippets/self-signed.conf
COPY ./srcs/ssl-params.conf /etc/nginx/snippets/ssl-params.conf

# setting DATABASE
# there is no password -> so only ID(root)
COPY ./srcs/db_setting.sql /tmp
RUN service mysql start && mysql -u root mysql < /tmp/db_setting.sql

# create phpmyadmin folder
RUN mkdir -p /var/www/html/phpmyadmin/tmp
RUN chmod 777 /var/www/html/phpmyadmin/tmp

# RUN - make a new layer, or execute command
# CMD - when docker instruction run, cmd's instruction is ignored
# cmd isn't work when using run -it [docker_image]/bin/bash
# because bin/bash is executed
COPY ./srcs/run.sh /tmp/run.sh
RUN chmod 777 /tmp/run.sh
CMD  /tmp/run.sh
# CMD /bin/bash
