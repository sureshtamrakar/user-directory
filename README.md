### User Directory
##### User Directory with muti auth built with Laravel 
#### Installation Instructions


* clone this repo
* run `composer install`
* run `cp .env.example .env`and Edit .env file according to your settings
* php artisan key:generate
* php artisan migrate
* php artisan db:seed
* php artisan db:seed --class=AdminSeeder
* `php artisan serve` from root directory 
* * URL http://127.0.0.1:8000

##### App Info


| URL | Note
| --- | --- |
| `http://127.0.0.1:8000/admin/login` | ``` Admin Login ```  *Email : doejohn@gmail.com* *Password : password* 
| `http://127.0.0.1:8000/register`  | ```Register user```
| `http://127.0.0.1:8000/login`  | ```Login user```
