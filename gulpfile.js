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
    mix.styles('./bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css');
    mix.styles('./bower_components/bootstrap-fileinput/css/fileinput.min.css');
    mix.sass('app.scss');
});

elixir(function(mix) {
    mix.scripts('./bower_components/moment/min/moment.min.js');
    mix.scripts('./bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');
    mix.scripts('./bower_components/bootstrap-fileinput/js/fileinput.min.js');
    mix.scripts('app.js');
});

elixir(function(mix) {
    mix.version(['css/app.css', 'js/app.js']);
});

elixir(function(mix) {
    mix.copy('./bower_components/bootstrap-fileinput/img/loading.gif', 'public/img/loading.gif');
});

