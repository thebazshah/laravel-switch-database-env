<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Repository

This repository is is linked with a two-part Medium article. Code is written to fulfil the requirement of having two different database environments where user is able to choose between the two (or more), and application simply starts storing and retrieving data from one or the other set of tables. Suppose you want to have tables in your database like this:

Common tables (for authentication and configuration etc.)
--- users

Production tables (for storing production content)
--- articles
--- comments
--- tags

Development tables (for storing development content)
--- articles
--- comments
--- tags

Common tables are used regardless of which environment is set but user should be able to switch between the other two sets of tables: development and production. This is what this repository showcases. And this is what I have explained in following Medium articles.
1. [Laravel: Having Two (or More) Sets of Tables You Can Switch Between as per User Preferences (Part 1 of 2)](https://medium.com/@thebazshah/laravel-having-two-or-more-sets-of-tables-according-to-user-preferences-part-1-of-2-ab0a25a1ab40)
2. [Laravel: Having Two (or More) Sets of Tables You Can Switch Between as per User Preferences (Part 2 of 2)](https://medium.com/@thebazshah/laravel-having-two-or-more-sets-of-tables-you-can-switch-between-as-per-user-preferences-part-2-f1f3e34b0f32)

## How to Set Up
Having all of the dependencies installed and correctly working, as described in the articles, open a terminal and run following command.
```
composer install
```
Once everything is installed, simply run the application (using Laravel Sail).

```
./vendor/bin/sail up
```

Once all of the containers are up and running, you can migrate the database changes to database, and then seed the data.
```
php artisan migrate
php artisan db:seed
```
After successful invocation of these commands, you can use HTTP client of your choice to test the API.
