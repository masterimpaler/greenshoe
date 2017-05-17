<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## GreenShoe Debtor portal

Greenshow is an application that searches through debtor records and downloads these records to an excel file.

## Installation

``git clone https://github.com/masterimpaler/greenshoe.git``

###### Navigate to the cloned directory
Run  `` composer install``

###### Create a copy of .env.example to .env and enter your database credentials



## Important

To run the application make sure the following lines are uncommented in php.ini

``extension=php_pdo_pgsql.dll`` and 
  ``extension=php_pgsql.dll``
