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

mix
    .scripts([
        'resources/views/admin/assets/js/jquery.min.js'
    ], 'public/backend/assets/js/jquery.js')

    .scripts([
        'resources/views/admin/assets/js/scripts.js'
    ], 'public/backend/assets/js/scripts.js')

    .scripts([
        'resources/views/app/assets/js/login.js'
    ], 'public/backend/assets/js/login.js')


    .copyDirectory('resources/views/admin/assets/css/fonts', 'public/backend/assets/css/fonts')

    .copyDirectory('resources/views/admin/assets/images', 'public/backend/assets/images')

    .options({
        processCssUrls: false
    })

    .version()
;
