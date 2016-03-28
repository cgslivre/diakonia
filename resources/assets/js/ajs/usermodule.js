var app = angular.module('usuariosRecord', ['ngSanitize','ui.mask'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);


app.controller('usuariosController', ['$scope', '$http',
  function ($scope, $http) {
    $scope.usuarios = [];
    $http.get("/usuario").success(function(data) {

        $scope.usuarios = data;
    });
    $scope.avatarPathSmall = function( avatar ){
        if ( avatar === null ){
            return window.location.origin + '/users/avatar/000-default-70px.jpg';
        } else{
            return window.location.origin  + '/' + avatar + '70px.jpg';
        }
	};

    $scope.userEditLink = function( user ){
        return window.location.origin + '/usuario/' + user + '/edit';
	};

    $scope.userShowLink = function( user ){
        return window.location.origin + '/usuario/' + user;
	};

    $scope.ordenarPor = function( campo ){
		$scope.criterioDeOrdenacao = campo;
		$scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
	};

}]);

app.filter('highlight', ['$sce', function($sce) {
    return function(text, phrase) {
        if( phrase ){
            text = text.replace(new RegExp('('+phrase+')', 'gi'), '<span class="highlighted">$1</span>');
        }
        return $sce.trustAsHtml(text);
    };
}]);

app.filter('formatPhone', ['$sce', function($sce) {
    return function(input) {
        if( input == null || input.length == 0 ){
            return '';
        } else{
            switch (input.length) {
                case 8:
                    return input.slice(0,4) + '-' + input.slice(4,8);
                case 9:
                    return input.slice(0,5) + '-' + input.slice(5,9);
                case 10:
                    return '(' + input.slice(0,2) + ') ' + input.slice(2,6) + '-' + input.slice(6,10);
                case 11:
                    return '(' + input.slice(0,2) + ') ' + input.slice(2,7) + '-' + input.slice(7,11);
                default:
                    return input;
            }
        }
    };
}]);
