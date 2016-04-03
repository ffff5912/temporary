#!/bin/sh

##### yum update all
sudo yum -y update

##### edit resolv.conf
sudo sed -i -e "1i options single-request-reopen" /etc/resolv.conf

# Firewall、SELinux OFF
sudo /etc/rc.d/init.d/iptables stop
sudo chkconfig iptables off
sudo chkconfig ip6tables off

sudo cp -p /etc/selinux/config /etc/selinux/config.orig
sudo sed -i -e "s|^SELINUX=.*|SELINUX=disabled|" /etc/selinux/config

##### install epel
wget https://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
sudo rpm -Uvh epel-release-6-8.noarch.rpm
sudo sed -i -e "s/enabled=1/enabled=0/" /etc/yum.repos.d/epel.repo

##### install remi
wget http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
sudo rpm -Uvh remi-release-6.rpm

##### install
sudo yum install -y git vim gcc-c++

echo ----------------------------------------------------------------------------
echo Base FINISH
echo ----------------------------------------------------------------------------
