#!/bin/bash
sudo apt-get update > /dev/null

echo ">>>>>>>>>>>>>>>>>>> Running bootstrap.sh <<<<<<<<<<<<<<<<<<"

#install mysql
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root' > /dev/null
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root' > /dev/null
sudo apt-get install -y mysql-server > /dev/null

#install php
sudo apt-get install python-software-properties software-properties-common

#html to pdf service
sudo apt-get install wkhtmltopdf xvfb
sudo apt-get install openssl build-essential xorg libssl-dev
echo 'xvfb-run -a -s "-screen 0 640x480x16" wkhtmltopdf "$@"' > /usr/local/bin/wkhtmltopdf.sh
sudo chmod a+x /usr/local/bin/wkhtmltopdf.sh

sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
sudo apt-get update

sudo apt-get install -y git apache2 php7 php7-xml libapache2-mod-php7 curl php7-mysql php7-cli php7-curl php7-mysql php7-intl > /dev/null

echo "ServerName localhost" | sudo tee -a /etc/apache2/apache2.conf
sudo a2enmod rewrite > /dev/null

sudo cp /vagrant/apache2/vhost.conf /etc/apache2/sites-available/000-default.conf
sudo cp /vagrant/xdebug/xdebug.ini /etc/php5/mods-available/xdebug.ini
sudo cp /vagrant/php/php.ini /etc/php5/apache2/php.ini

sudo sed -i 's/bind-address/;bind-address/g' /etc/mysql/my.cnf
sudo sed -i 's/skip-external-locking/;skip-external-locking/g' /etc/mysql/my.cnf

mysql -uroot -proot -e "GRANT ALL ON *.* to root@'%' IDENTIFIED BY 'root'; FLUSH PRIVILEGES;"

sudo rm -rf /var/www/html

#change webserver user to vagrant, fixes permission issues on linux hosts
sudo sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/' /etc/apache2/envvars
sudo sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/' /etc/apache2/envvars

sudo service apache2 restart > /dev/null
sudo service mysql restart > /dev/null

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

echo "alias s='php /var/www/app/console'" >> ~/.bash_aliases

cd /var/www

echo "Installing composer packages"
composer install --prefer-dist -o > /dev/null

php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load -n

