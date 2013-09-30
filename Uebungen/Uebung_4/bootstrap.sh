#!/usr/bin/env bash

apt-get update
sudo apt-get install -y apache2-mpm-prefork php5 php5-curl php5-dev php5-gd php5-idn php5-imagick php5-imap php5-mysql php5-sqlite php5-xcache php5-mcrypt php5-xsl mysql-server-5.5 phpmyadmin
sudo a2enmod suexec rewrite ssl actions include vhost_alias
sudo locale-gen de_CH.UTF-8
update-locale LC_ALL=de_CH.UTF-8
echo "Europe/Zurich" | sudo tee /etc/timezone
sudo dpkg-reconfigure --frontend noninteractive tzdata	
# preconfigure phpmyadmin
echo 'dbconfig-common dbconfig-common/mysql/app-pass password vagrant' | sudo debconf-set-selections
echo 'dbconfig-common dbconfig-common/mysql/app-pass password' | sudo debconf-set-selections
echo 'dbconfig-common dbconfig-common/password-confirm password vagrant' | sudo debconf-set-selections
echo 'dbconfig-common dbconfig-common/app-password-confirm password vagrant' | sudo debconf-set-selections
echo 'dbconfig-common dbconfig-common/app-password-confirm password vagrant' | sudo debconf-set-selections
echo 'dbconfig-common dbconfig-common/password-confirm password vagrant' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/dbconfig-install boolean false' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/app-password-confirm password vagrant' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/admin-pass password vagrant' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/password-confirm password vagrant' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/setup-password password vagrant' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/database-type select mysql' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/app-pass password vagrant' | sudo debconf-set-selections