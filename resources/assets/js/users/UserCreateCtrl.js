app.controller('userCreateCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $scope.button = "Criar Usuário";
    $scope.criarUsuario = function (usuario) {
    		console.log(usuario);
            /*
    		$http.post("http://localhost:3412/contatos", contato).success(function (data) {
    			delete $scope.contato;
    			$scope.contatoForm.$setPristine();
    			carregarContatos();
    		});*/
    };
  }
]);
