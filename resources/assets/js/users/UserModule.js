var app = angular.module('usuariosRecord', ['ngMessages','ngSanitize','ui.mask','remoteValidation', 'comum'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);

app.controller('userCreateCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.button = "Criar Usuário";
    $scope.emailField = true;

  }
]);

app.controller('userEditCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.button = "Atualizar Usuário";
    $scope.emailField = false;

    $scope.usuario = {};
    $scope.usuario.name = post['name'];
    $scope.usuario.email = post['email'];
    $scope.usuario.telefone = post['telefone'];
  }
]);

app.controller('usuariosController', ['$scope', '$http',
  function ($scope, $http) {
    $scope.carregando = true;
    $scope.usuarios = [];
    $http.get("/usuario").then(function(response) {

        $scope.usuarios = response.data;
        $scope.carregando = false;

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

    $scope.userShowPermissionLink = function( user ){
        return window.location.origin + '/usuario/' + user + '/permissoes';
	};

    $scope.ordenarPor = function( campo ){
		$scope.criterioDeOrdenacao = campo;
		$scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
	};

}]);

app.filter('roleuserfilter', ['$sce', function($sce) {
    return function(input) {
        if( input === 'role-user-admin') return 'Administrador';
        else if( input === 'role-user-manage') return 'Gerente';
        else if( input === 'role-user-users') return 'Padrão';
        else return input;
    };
}]);
