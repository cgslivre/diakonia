let mix = require('laravel-mix');

mix.sass('resources/assets/sass/index.scss', 'public/css/style.css')
    .extract(['materialize-css'], 'public/js/vendor.js')