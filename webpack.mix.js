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
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

mix.styles([
    'public/assets/travel/css/bootstrap.min.css',
    'public/assets/travel/css/animate.css',
    'public/assets/travel/css/jquery.fancybox.css',
    'public/assets/travel/css/owl.carousel.css',
    'public/assets/travel/css/style.css',
    'public/assets/travel/fonts/font-awesome/css/font-awesome.min.css'
], 'public/css/travel.css');

// mix.babel('public/assets/travel/js/*.js', 'public/js/travel.js');


mix.scripts([
    'public/assets/travel/js/jquery.js',
    'public/assets/travel/js/bootstrap.min.js',
    'public/assets/travel/js/jquery.easing.min.js',
    'public/assets/travel/js/wow.js',
    'public/assets/travel/js/jquery.mixitup.min.js',
    'public/assets/travel/js/jquery.fancybox.pack.js',
    'public/assets/travel/js/waypoints.min.js',
    'public/assets/travel/js/jquery.counterup.min.js',
    'public/assets/travel/js/owl.carousel.min.js',
    'public/assets/travel/js/jquery.stellar.min.js',
    'public/assets/travel/js/bootstrap-datepicker.js',
    'public/assets/travel/js/script.js',
], 'public/js/travel.js');

if (mix.inProduction()) {
    mix.version();
}
