
sudo apt-get -y update

sudo echo 'mysql-server mysql-server/root_password password root' | debconf-set-selections

sudo echo 'mysql-server mysql-server/root_password_again password root' | debconf-set-selections

sudo apt-get -y install mysql-server mysql-client

sudo apt-get -y install curl php5 php5-curl php5-cli php5-mysql

cd /vagrant

sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

composer install