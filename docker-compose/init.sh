#!/bin/bash

until pg_isready -h db -p 5432 -U postgres; do
  sleep 1
done

composer install

php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan migrate:fresh --seed

chmod 777 -R storage
chmod 777 -R storage/*
chown -R www-data:www-data storage
chown -R www-data:www-data storage/*

# Start the server
php-fpm
