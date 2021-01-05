composer install
cp .env.exemple .env || copy .env.exemple .env
php artisan migrate
