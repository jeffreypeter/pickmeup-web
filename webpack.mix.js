/*jshint esversion: 6 */

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

mix.copy('bower_components/bootstrap/dist/fonts', 'public/assets/fonts');
mix.copy('bower_components/fontawesome/fonts', 'public/assets/fonts');
mix.styles([
    'bower_components/bootstrap/dist/css/bootstrap.css',
    'bower_components/fontawesome/css/font-awesome.css',
    'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
    'node_modules/datatables.net-dt/css/jquery.dataTables.css',
    'resources/css/sb-admin-2.css',
    'resources/css/timeline.css'
], 'public/assets/stylesheets/styles.css')
    .sourceMaps()
    .version();
mix.scripts([
    'bower_components/jquery/dist/jquery.js',
    'bower_components/moment/min/moment.min.js',
    'bower_components/bootstrap/dist/js/bootstrap.js',
    'bower_components/Chart.js/dist/Chart.js',
    'bower_components/metisMenu/dist/metisMenu.js',
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/parsleyjs/dist/parsley.js',
    'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    'resources/js/sb-admin-2.js',
    'resources/js/frontend.js'
], 'public/assets/scripts/frontend.js')
    .sourceMaps()
    .version();
