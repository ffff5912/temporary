#!/bin/sh

##### install PHP
sudo yum --enablerepo=epel,remi,remi-php55 install -y php php-cli php-common php-devel php-gd \
php-intl php-mbstring php-pdo php-mysqlnd php-pear.noarch php-xml php-mcrypt libxml2-devel openssl-devel \
gd-devel curl-devel libmcrypt-devel re2c \
php-pecl-memcache php-pecl-memcached php-pecl-xdebug php-pecl-xhprof

sudo sed -i -e "s|;error_log = syslog|error_log = /var/log/php.log|" /etc/php.ini
sudo sed -i -e "s|;mbstring.language = Japanese|mbstring.language = Japanese|" /etc/php.ini
sudo sed -i -e "s|;mbstring.internal_encoding = UTF-8|mbstring.internal_encoding = UTF-8|" /etc/php.ini
sudo sed -i -e "s|;mbstring.http_input = auto|mbstring.http_input = auto|" /etc/php.ini
sudo sed -i -e "s|;mbstring.detect_order = auto|mbstring.detect_order = UTF-8,SJIS,EUC-JP,JIS,ASCII|" /etc/php.ini
sudo sed -i -e "s|expose_php = On|expose_php = Off|" /etc/php.ini
sudo sed -i -e "s|;date.timezone =|date.timezone = Asia/Tokyo|" /etc/php.ini
# sudo echo "extension=memcached.so" >> /etc/php.ini
sudo sh -c "echo 'extension=memcached.so' >> /etc/php.ini"

# sh -c "echo 'hoge'
sudo service httpd restart

# sudo rm -rf /var/www/html
# sudo ln -fs /vagrant /var/www/html

echo '<?php phpinfo(); ?>' > /var/www/html/phpinfo.php

echo ----------------------------------------------------------------------------
echo PHP FINISH
echo ----------------------------------------------------------------------------
