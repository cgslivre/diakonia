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
	'fontawesome':'vendor/components/font-awesome',
	'bower':'bower_components'
}
////node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.css

elixir(function(mix) {
	// Copia as fontes do Bootstrap
	mix.copy(paths.bootstrap + '/fonts', 'public/fonts')
	mix.copy(paths.fontawesome + '/fonts', 'public/fonts')
	// Junta e minimiza os arquivos de scripts
	mix.scripts([
			paths.jquery + "/jquery.min.js" ,
			paths.bootstrap + "/js/bootstrap.min.js" ,
			paths.bower + "/angular/angular.min.js",
			paths.bower + "/angular-sanitize/angular-sanitize.min.js",
			paths.bower + "/angular-messages/angular-messages.min.js",
			paths.bower + "/angular-locale-pt-br/angular-locale_pt-br.js",
			paths.bower + "/angular-ui-mask/dist/mask.min.js",
			paths.default + "/js/app.js"
	], 'public/js/app.min.js', './')

	// Scripts Usuários
	mix.scripts([
			"users/UserModule.js"
	], 'public/js/users/app-users-module.min.js')

	mix.scripts([
			"users/UserIndexCtrl.js"
	], 'public/js/users/users-index-ctrl.min.js')

	// Junta e minimiza os arquivos de estilos
	mix.styles([
				paths.bootstrap + "/css/bootstrap.css",
				paths.fontawesome + "/css/font-awesome.min.css",
				paths.default + "/css/checkbox3.css",
        paths.default + "/css/main.css",
				paths.default + "/css/theme.css"
    ], 'public/css/all.min.css', './');
});
