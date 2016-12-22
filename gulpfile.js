var gulp  = require('gulp');
var util = require('gulp-util');
var expect = require('gulp-expect-file');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var size = require('gulp-size');
var rm = require('gulp-rimraf');
var runSequence = require('run-sequence');
var uglify = require('gulp-uglify');


//var elixir = require('laravel-elixir');

var paths = {
	'default' : 'resources/assets',
	'bootstrap':'vendor/twitter/bootstrap/dist',
	'jquery':'vendor/components/jquery',
	'fontawesome':'vendor/components/font-awesome',
	'bower':'bower_components'
}

var config = {
    production: !!util.env.production
};

gulp.task('ambiente', function(){
	if( config.production ){
		util.log(util.colors.bgRed(util.colors.white('Ambiente de Produção')));
	} else{
		util.log(util.colors.bgBlue(util.colors.white('Ambiente de Desenvolvimento')));
	}
});

gulp.task('clean', function() {
    return gulp.src([
		'public/css/*'
		,'public/js/*'
		,'public/fonts/*'
	]).pipe(rm());
});

gulp.task('fonts', function(){
	util.log(util.colors.green('Copiando arquivos de fontes'));
	gulp.src(paths.fontawesome + '/fonts/*')
		.pipe(gulp.dest('public/fonts'));
});

gulp.task('css', function(){
	util.log(util.colors.green('Copiando arquivos de CSS'));
	var files = [
		// Em avaliação
		paths.bootstrap + '/css/bootstrap.css'
		,paths.default + '/css/checkbox3.css'
		,paths.bower + '/datetimepicker/jquery.datetimepicker.css'
		,paths.bower + '/select2/dist/css/select2.min.css'
		,paths.bower + '/angular-ui-select/dist/select.min.css'
		,paths.bower + '/checkbox3/dist/checkbox3.min.css'
		,paths.bower + '/image-picker/image-picker/image-picker.css'
		// OK
		,paths.fontawesome + '/css/font-awesome.min.css'
		,paths.default + '/css/main.css'
		,paths.default + '/css/forms.css'
		,paths.default + '/css/ng-tags-input.css'
		,paths.default + '/css/theme.css'

	];

	gulp.src(files)
		.pipe(expect({ checkRealFile: true, verbose: true },files))
		.pipe(size({showFiles: true}))
		.pipe(concat('all.min.css'))
		.pipe(config.production ? cleanCSS(): util.noop())
		.pipe(size({showFiles: true}))
		.pipe(gulp.dest('public/css'));



});

gulp.task('js', function(){
	util.log(util.colors.green('Copiando arquivos de Javascript'));
	var filesjs = [
		// Definidos
		paths.bower + '/angular/angular.min.js'
		,paths.bower + '/ng-tags-input/ng-tags-input.min.js'
		,paths.bower + '/angular-resource/angular-resource.min.js'
		// A definir
		,paths.jquery + '/jquery.min.js'
		,paths.bootstrap + '/js/bootstrap.min.js'
		,paths.bower + '/angular-sanitize/angular-sanitize.min.js'
		,paths.bower + '/angular-messages/angular-messages.min.js'
		,paths.bower + '/angular-locale-pt-br/angular-locale_pt-br.js'
		,paths.bower + '/ng-remote-validate/release/ngRemoteValidate.js'
		,paths.bower + '/angular-ui-mask/dist/mask.min.js'
		,paths.bower + '/angular-ui-select/dist/select.min.js'
		,paths.bower + '/moment/min/moment-with-locales.min.js'
		,paths.bower + '/php-date-formatter/js/php-date-formatter.js'
		,paths.bower + '/datetimepicker/jquery.datetimepicker.js'
		,paths.bower + '/select2/dist/js/select2.full.min.js'
		,paths.bower + '/select2/dist/js/i18n/pt-BR.js'
		,paths.bower + '/image-picker/image-picker/image-picker.min.js'
		// Definidos
		,paths.default + '/js/app.js'
	];

	gulp.src(filesjs)
		.pipe(expect({ checkRealFile: true, verbose: true },filesjs))
		.pipe(size({showFiles: true}))
		.pipe(concat('app.min.js'))
		.pipe(config.production ? uglify(): util.noop())
		.pipe(size({showFiles: true}))
		.pipe(gulp.dest('public/js'));

});

gulp.task('angular', function(){
	// Usuários
	gulp.src([
		paths.default + '/js/users/UserModule.js'
		, paths.default + '/js/users/UserIndexCtrl.js'
		, paths.default + '/js/users/UserCreateCtrl.js'
		, paths.default + '/js/users/UserEditCtrl.js'
	]).pipe(size({showFiles: true}))
	.pipe(config.production ? uglify(): util.noop())
	.pipe(concat('app-users-module.min.js'))
	.pipe(gulp.dest('public/js/users'));

	// Música
	gulp.src([
		paths.default + '/js/musica/MusicaEventoModule.js'
		, paths.default + '/js/musica/MusicaEventoCreateCtrl.js'
		, paths.default + '/js/musica/MusicaEventoEditCtrl.js'
	]).pipe(size({showFiles: true}))
	.pipe(config.production ? uglify(): util.noop())
	.pipe(concat('app-musica-module.min.js'))
	.pipe(gulp.dest('public/js/musica'));

	gulp.src([
		paths.default + '/js/musica/MusicaStaffModule.js'
		, paths.default + '/js/musica/MusicaStaffCreateCtrl.js'
	]).pipe(size({showFiles: true}))
	.pipe(config.production ? uglify(): util.noop())
	.pipe(concat('app-musica-staff-module.min.js'))
	.pipe(gulp.dest('public/js/musica'));

	gulp.src([
		paths.default + '/js/musica/MusicaEscalaModule.js'
		, paths.default + '/js/musica/MusicaEscalaCreateCtrl.js'
	]).pipe(size({showFiles: true}))
	.pipe(config.production ? uglify(): util.noop())
	.pipe(concat('app-musica-escala-module.min.js'))
	.pipe(gulp.dest('public/js/musica'));

	gulp.src([
		paths.default + '/js/membro/MembroModule.js'
	]).pipe(size({showFiles: true}))
	.pipe(config.production ? uglify(): util.noop())
	.pipe(concat('app-membro-module.min.js'))
	.pipe(gulp.dest('public/js/membro'));
});

gulp.task('default', function( cb ){
	runSequence(['ambiente', 'fonts', 'css', 'js', 'angular', 'watch'], cb);
});

gulp.task('watch', ['ambiente'],function(){
    gulp.watch(paths.default + '/css/*.css',['css']);
    gulp.watch(paths.default + '/js/*.js',['js']);
	gulp.watch(paths.default + '/js/**/*.js',['angular']);
});
