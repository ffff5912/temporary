#!/bin/sh

sudo yum install -y memcached gcc automake autoconf libtool make zlib-devel
sudo pecl install memcache
sudo /etc/init.d/memcached start
sudo chkconfig memcached on

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

sudo service httpd restart

# install zsh
sudo yum -y install zsh

# install fish
cd /etc/yum.repos.d/
sudo wget http://download.opensuse.org/repositories/shells:fish:release:2/CentOS_6/shells:fish:release:2.repo
sudo yum -y install fish

echo ----------------------------------------------------------------------------
echo etc FINISH
echo ----------------------------------------------------------------------------
