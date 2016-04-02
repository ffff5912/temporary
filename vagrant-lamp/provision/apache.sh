#!/bin/sh

##### install apache webserver
sudo yum install -y httpd
sudo usermod -aG vagrant apache

sudo cp -f /vagrant/setting/vhost.conf /etc/httpd/conf.d/vhost.conf

sudo chkconfig httpd on
sudo service httpd start
sudo service iptables stop
sudo chkconfig iptables off

echo ----------------------------------------------------------------------------
echo Apache FINISH
echo ----------------------------------------------------------------------------
