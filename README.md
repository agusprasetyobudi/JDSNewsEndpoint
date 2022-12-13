<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
 
## About API Endpoint JDS News Endpoint build On Laravel

Haiiii, ini adalah API Endpoint dengan menggunakan laravel 9 
dan menggunakan package bawaan dari laravel itu sendiri seperti :

- Laravel Passport
- Laravel API Eloquent Resource


## How to deploy ?

- composer install
- duplicate and rename .env.example to .env
- php artisan key:gen && php artisan passport:install --force && php artisan db:seed
- enjoy your using API Endpoint  

## if you use docker

Use the docker-compose to install application. 
```bash
docker compose up -d
```
after the docker-compose continue to access web for migrate & seeder data. 
```bash
https://localhost/call-migration
``` 

postman link public : https://elements.getpostman.com/redirect?entityId=4270905-0112740e-23c9-4f89-8cc1-fb6ef1bc2931&entityType=collection
