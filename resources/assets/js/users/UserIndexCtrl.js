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
