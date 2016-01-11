var elixir = require('laravel-elixir');

//elixir.config.assetsDir = '/'; //trailing slash required.

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
/*
elixir(function(mix) {
    mix.sass('app.scss');
});
*/

var paths = {
	'default' : '/resources/assets',
	'bootstrap':'vendor/twitter/bootstrap/dist'
}


elixir(function(mix) {
	// Copia as fontes do Bootstrap
	mix.copy( paths.bootstrap + '/fonts', 'public/fonts')
	// Junta e minimiza os arquivos de estilos
	mix.styles([
				paths.bootstrap + "/css/bootstrap.css",
        paths.default + "/css/main.css"
    ], 'public/css/all.min.css', './');
});
