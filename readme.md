

## GreenShoe Debtor portal

Greenshow is an application that searches through debtor records and downloads these records to an excel file. The project has been made using laravel.

## Installation

``git clone https://github.com/masterimpaler/greenshoe.git``

###### Navigate to the cloned directory
Run  `` composer install``

###### Create a copy of .env.example to .env and enter your database credentials

###### While on the project directory, start the application by running 
`` php artisan serve``

##### The application is now accessible via the browser at ``http://127.0.0.1:8000``



## Important

To run the application make sure the following lines are uncommented in php.ini

``extension=php_pdo_pgsql.dll`` and 
  ``extension=php_pgsql.dll``
