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
    .postCss('resources/css/homepage.css', 'public/css', []) 
    .postCss('resources/css/schedule.css', 'public/css', []) 
    .postCss('resources/css/map.css', 'public/css', []) 
    .postCss('resources/css/supportFaqProfile.css', 'public/css', []) 
    .postCss('resources/css/auth.css', 'public/css', []) 
    .js('resources/js/mapJS.js', 'public/js')
    .js('resources/js/orgMapJS.js', 'public/js'); 
