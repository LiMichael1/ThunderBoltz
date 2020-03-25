#!/bin/bash

# Install packages
npm install;
composer install;

mv .env.example .env;

# Setup DB
php artisan key:generate;
php artisan migrate;

# Build development
npm run dev;
