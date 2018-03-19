let mix = require('laravel-mix');

mix.sass('resources/assets/sass/index.scss', 'public/css/style.css')
    .js(['resources/assets/js/materialize.js'], 'public/js/app.js')
    .extract(['materialize-css'], 'public/js/vendor.js')