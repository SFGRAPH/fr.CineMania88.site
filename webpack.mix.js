const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the CSS
 | files and the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js') // Si vous utilisez bootstrap.js
    .styles([
        'resources/css/all.css',
        'resources/css/dashboard.css'
    ], 'public/css/all.css')
    .sourceMaps();


    