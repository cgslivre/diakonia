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
			paths.bower + "/ng-remote-validate/release/ngRemoteValidate.js",
			paths.bower + "/angular-ui-mask/dist/mask.min.js",
			paths.bower + "/angular-ui-select/dist/select.min.js",
			paths.bower + "/moment/min/moment-with-locales.min.js",
			paths.bower + "/php-date-formatter/js/php-date-formatter.js",
			paths.bower + "/datetimepicker/jquery.datetimepicker.js",
			paths.bower + "/select2/dist/js/select2.full.min.js",
			paths.bower + "/select2/dist/js/i18n/pt-BR.js",
			paths.bower + "/image-picker/image-picker/image-picker.min.js",
			paths.default + "/js/app.js"
	], 'public/js/app.min.js', './')

	// Scripts Usuários
	mix.scripts([
			"users/UserModule.js",
			"users/UserIndexCtrl.js",
			"users/UserCreateCtrl.js",
			"users/UserEditCtrl.js"
	], 'public/js/users/app-users-module.min.js')

	// Scripts Música
	mix.scripts([
			"musica/MusicaEventoModule.js",
			"musica/MusicaEventoCreateCtrl.js",
			"musica/MusicaEventoEditCtrl.js",
	], 'public/js/musica/app-musica-module.min.js')

	mix.scripts([
			"musica/MusicaStaffModule.js",
			"musica/MusicaStaffCreateCtrl.js",
	], 'public/js/musica/app-musica-staff-module.min.js')

	mix.scripts([
			"musica/MusicaEscalaModule.js",
			"musica/MusicaEscalaCreateCtrl.js",
	], 'public/js/musica/app-musica-escala-module.min.js')

	// Scripts Membros
	mix.scripts([
			"membro/MembroModule.js",
	], 'public/js/membro/app-membro-module.min.js')

	// Junta e minimiza os arquivos de estilos
	mix.styles([
				paths.bootstrap + "/css/bootstrap.css",
				paths.fontawesome + "/css/font-awesome.min.css",
				paths.default + "/css/checkbox3.css",
				paths.bower + "/datetimepicker/jquery.datetimepicker.css",
				paths.bower + "/select2/dist/css/select2.min.css",
				paths.bower + "/angular-ui-select/dist/select.min.css",
				paths.bower + "/checkbox3/dist/checkbox3.min.css",
				paths.bower + "/image-picker/image-picker/image-picker.css",
        		paths.default + "/css/main.css",
				paths.default + "/css/theme.css"
    ], 'public/css/all.min.css', './');
});
