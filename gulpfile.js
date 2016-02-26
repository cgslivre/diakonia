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
	'bootstrap':'vendor/twitter/bootstrap/dist',
	'jquery':'vendor/components/jquery',
	'fontawesome':'vendor/components/font-awesome'
}


elixir(function(mix) {
	// Copia as fontes do Bootstrap
	mix.copy(paths.bootstrap + '/fonts', 'public/fonts')
	mix.copy(paths.fontawesome + '/fonts', 'public/fonts')
	// Junta e minimiza os arquivos de scripts
	mix.scripts([
			paths.jquery + "/jquery.min.js" ,
			paths.bootstrap + "/js/bootstrap.min.js" ,
			paths.default + "/js/app.js"
	], 'public/js/app.min.js', './')
	// Junta e minimiza os arquivos de estilos
	mix.styles([
				paths.bootstrap + "/css/bootstrap.css",
				paths.fontawesome + "/css/font-awesome.min.css",
				paths.default + "/css/checkbox3.css",
        paths.default + "/css/main.css",
				paths.default + "/css/theme.css"
    ], 'public/css/all.min.css', './');
});
