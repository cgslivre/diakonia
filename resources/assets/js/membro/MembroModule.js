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

    $scope.avatarPathSmall = function( avatar, sexo ){
        if ( avatar === null ){
            if( sexo == 'F'){
                return window.location.origin + '/img/membro/000-default-mulher-70px.jpg';
            } else{
                return window.location.origin + '/img/membro/000-default-homem-70px.jpg';
        }
        } else{
            return window.location.origin  + '/' + avatar + '70px.jpg';
        }
	};
    
    $scope.ordenarPor = function( campo ){
		$scope.criterioDeOrdenacao = campo;
		$scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
	};

}]);
