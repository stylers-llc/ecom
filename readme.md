###Install component

add Stylers\Taxonomy\Providers\EcomServiceProvider::class and Stylers\Ecom\Providers\EcomEventServiceProvider::class to config/app providers
run npm install in package public/
php artisan vendor:publish --provider="Stylers\Ecom\Providers\EcommerceServiceProvider"
php artisan db:seed --class=EcomSeeder