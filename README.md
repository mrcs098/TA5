Counter POS

This is a Laravel project for IT0049 TFA5. It has Home, About, Customer Accounts and User Accounts pages.

GitHub repository
https://github.com/mrcs098/TA5

Live website
https://counter-pos-pibg.onrender.com

Requirements
PHP 8.5 and Composer 2.

How to run locally on Windows

Download the project and open Command Prompt inside the project folder. Run these commands one at a time:

composer install

copy .env.example .env

php artisan key:generate

php artisan serve --no-reload

Open http://127.0.0.1:8000 in your browser. Keep Command Prompt open while using the local website.

Sample data

The Customers and Users pages each display five fictional records from static PHP arrays. Blade loops display the records. Migration and seeder files are included in the database folder.

Hosting

The website is hosted on Render.
