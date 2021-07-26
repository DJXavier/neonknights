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
    .react()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/youplay.scss', 'public/css')
    .sass('resources/sass/youplay-anime.scss', 'public/css')
    .sass('resources/sass/youplay-light.scss', 'public/css')
    .sass('resources/sass/youplay-rtl.scss', 'public/css')
    .sass('resources/sass/youplay-shooter.scss', 'public/css');
