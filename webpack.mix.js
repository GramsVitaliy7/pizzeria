const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts('resources/js/shopping_cart.js', 'public/js/shopping_cart.js')
    .scripts('resources/js/product_details.js', 'public/js/product_details.js')
    .scripts('resources/js/product_filter.js', 'public/js/product_filter.js');
mix.scripts('resources/js/delete_record.js', 'public/js/delete_record.js')
    .scripts('resources/js/create_update_product.js', 'public/js/create_update_product.js')
    .scripts('resources/js/progress_bar.js', 'public/js/progress_bar.js');

