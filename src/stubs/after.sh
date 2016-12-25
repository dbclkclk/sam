#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.

cp /home/vagrant/Code/sammedia/laravel.ini  /etc/php/7.1/fpm/conf.d/
