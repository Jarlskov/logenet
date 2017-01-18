var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    /*
    mix.styles('./bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css');
    mix.styles('./bower_components/bootstrap-fileinput/css/fileinput.min.css');
    mix.styles('./bower_components/bootstrap-material-design/dist/bootstrap-material-design.min.css');
    */
    mix.styles([
        './bower_components/bootstrap/dist/css/bootstrap.css',
        './bower_components/bootstrap-fileinput/css/fileinput.css',
        './bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        './bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.css',
        './bower_components/bootstrap-material-design/dist/css/ripples.css'
    ], 'public/css/libraries.css');

    mix.sass('app.scss');
});

elixir(function(mix) {
    mix.scripts([
        './bower_components/bootstrap/dist/js/bootstrap.js',
        './bower_components/bootstrap-fileinput/js/fileinput.js',
        './bower_components/moment/min/moment.min.js',
        './bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        './bower_components/bootstrap-material-design/dist/js/material.js',
        './bower_components/bootstrap-material-design/dist/js/ripples.js'
    ], 'public/js/libraries.js');

    mix.scripts('app.js');
});

elixir(function(mix) {
    mix.version(['css/libraries.css', 'css/app.css', 'js/app.js', 'js/libraries.js']);
    mix.copy('./bower_components/bootstrap-fileinput/img/loading.gif', 'public/build/img/loading.gif');
    mix.copy('./bower_components/bootstrap/fonts/glyphicons-halflings-regular.woff2', 'public/build/fonts/glyphicons-halflings-regular.woff2');
});

