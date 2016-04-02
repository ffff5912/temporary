#!/bin/sh

sudo cp -f /vagrant/setting/xdebug.ini /etc/php.d/xdebug.ini

curl -Ss https://getcomposer.org/installer | php > /dev/null
sudo mv composer.phar /usr/bin/composer

# install codesniffer
composer global require "squizlabs/php_codesniffer=*"
# install code fixer
composer global require "fabpot/php-cs-fixer"

composer config --global bin-dir "~/bin"

sudo yum --enablerepo=epel,remi,remi-php55 install -y phpMyAdmin
sudo sed -i 's/Allow from 127.0.0.1/Allow from 192.168/g' /etc/httpd/conf.d/phpMyAdmin.conf

sudo sed -i -e "/AddType text\/html \.php/i\AddType application\/x-httpd-php \.php \.html" /etc/httpd/conf.d/php.conf

echo ----------------------------------------------------------------------------
echo etc FINISH
echo ----------------------------------------------------------------------------
