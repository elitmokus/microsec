#!/bin/bash

#install composer
composer install --optimize-autoloader --no-dev --no-interaction

#copy .env.example to .env
cp .env.example .env

#generate app key
php artisan key:generate

#database migration
php artisan migrate --database=sqlite --force
