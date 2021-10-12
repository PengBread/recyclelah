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
<<<<<<< HEAD
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
=======
    .postCss('resources/css/homepage.css', 'public/css', [
    ]) .postCss('resources/css/schedule.css', 'public/css', [
    ]) .postCss('resources/css/map.css', 'public/css', [
    ]) .postCss('resources/css/supportFaqProfile.css', 'public/css', [
    ]);
>>>>>>> 18594e3 (Created Support[Feedback renamed], FAQ, Profile Page)
