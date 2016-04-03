#!/bin/sh

##### install Mysql
sudo yum --enablerepo=remi install -y mysql-server
sudo sed -i -e "4i character_set_server=utf8" /etc/my.cnf
sudo sed -i -e "5i default-storage-engine=InnoDB" /etc/my.cnf
sudo sed -i -e "6i innodb_file_per_table" /etc/my.cnf
sudo sed -i -e "7i [mysql]" /etc/my.cnf
sudo sed -i -e "8i default-character-set=utf8" /etc/my.cnf
sudo sed -i -e "9i [mysqldump]" /etc/my.cnf
sudo sed -i -e "10i default-character-set=utf8" /etc/my.cnf
sudo service mysqld start
sudo chkconfig mysqld on

echo ----------------------------------------------------------------------------
echo Mysql FINISH
echo ----------------------------------------------------------------------------
