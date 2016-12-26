#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.

sudo apt-get install -y apache2
sudo cp /home/vagrant/Code/sammedia/20-laravel.ini  /etc/php/7.1/fpm/conf.d/
sudo /etc/init.d/nginx restart
cd Code/sammedia/
ls
echo "Running migration"
php artisan migrate
echo "Migration finished"
echo "running seed"
php artisan db:seed
echo "Seed finish !"
echo "Running laravel listening queue"
php artisan queue:listen
echo "complete!"
