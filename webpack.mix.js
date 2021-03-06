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
    .js('resources/js/login.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/posts.js','public/js')
    .js('resources/js/header.js','public/js')
    .js('resources/js/friends.js','public/js')
    .js('resources/js/editProfile.js','public/js')
    .js('resources/js/notifications.js','public/js')
    .js('resources/js/register.js','public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));

mix.sass('resources/sass/login.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/profileHome.scss','public/css')
    .sass('resources/sass/friends.scss','public/css')
    .sass('resources/sass/profileSettings.scss','public/css')
    .sass('resources/sass/notifications.scss','public/css');
