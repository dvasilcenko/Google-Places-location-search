# Google Places location search

Checkout the [DEMO](http://dima.1337.lt/Google-Places-location-search/public/)

### Instalation Guide
```
git clone https://github.com/dvasilcenko/Google-Places-location-search.git
cd Google-Places-location-search
composer install
chmod 777 storage bootstrap/cache/ -R
mv .env.example .env
php artisan key:generate
```
enter your DB_DATABASE, DB_USERNAME, DB_PASSWORD
```
php artisan migrate:reset
php artisan migrate
```
now go to http://localhost/Google-Places-location-search/public/


### For code reviewers
For those who want to examine the code I personally wrote, please check files below:

[resources/views/index.blade.php](resources/views/index.blade.php)

[resources/views/layout.blade.php](resources/views/layout.blade.php)

[app/Http/Controllers/MainController.php](app/Http/Controllers/MainController.php)

[public/js/script.js](public/js/script.js)

[public/css/styles.css](public/css/styles.css)

[database/migrations/2016_09_20_182334_create_history_table.php](database/migrations/2016_09_20_182334_create_history_table.php)

[app/History.php](app/History.php)