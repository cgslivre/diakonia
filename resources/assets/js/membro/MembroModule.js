var app = angular.module('membrosRecord', ['ngMessages','ngSanitize','ui.mask','remoteValidation', 'comum'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);

app.controller('membrosIndexController', ['$scope', '$http',
  function ($scope, $http) {
    $scope.membros = [];
    $http.get("/membro").success(function(data) {

        $scope.membros = data;

    });

    $scope.avatarPathSmall = function( avatar ){
        if ( avatar === null ){
            return window.location.origin + '/img/membro/000-default-70px.jpg';
        } else{
            return window.location.origin  + '/' + avatar + '70px.jpg';
        }
	};
    /*
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

    $scope.userShowPermissionLink = function( user ){
        return window.location.origin + '/usuario/' + user + '/permissoes';
	};
    */
    $scope.ordenarPor = function( campo ){
		$scope.criterioDeOrdenacao = campo;
		$scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
	};

}]);
