const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    // mix.copy('node_modules/pikaday/css/pikaday.css', 'public/css/pikaday.css')
    .mix.copy('node_modules/flatpickr/dist/flatpickr.css', 'public/css/flatpickr.css')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ]);
