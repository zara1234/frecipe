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
    .js('resources/js/imagePreview.js', 'public/js')
    .js('resources/js/cookbookCreate.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/assets/img','public/img');