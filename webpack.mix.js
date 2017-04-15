const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('node_modules/bootstrap-material-design/dist/js/material.min.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .combine([
        'node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css',
        ], 'public/css/all.css')
    .version();