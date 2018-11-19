# afraa
The African Airlines Association (AFRAA) was established in April, 1968 in Accra , Ghana as a Trade Organisation open to membership of airlines of African States. There are currently forty members from African Union member States.

## Installation

```
#!clone

git clone https://github.com/Legibra/afraa.git

```

## Create folders

```
#!terminal

cp .env.example .env && mkdir bootstrap/cache storage storage/framework && cd storage/framework && mkdir sessions views cache && ../../

```

## Folder permissions

```
#!terminal

sudo chown :www-data app storage bootstrap -R && sudo chmod 775 app storage bootstrap -R

```

## Install dependencies

```
#!terminal

composer install

```
## Set the application key

```
#!terminal

php artisan key:generate

```
## Initialize App

```
#!terminal

php artisan afraa:permissions && php artisan afraa:initialize