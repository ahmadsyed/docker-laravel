#!/bin/sh
docker-compose build --no-cache && docker-compose up -d && docker-compose exec app php artisan migrate && docker-compose exec app php artisan db:seed