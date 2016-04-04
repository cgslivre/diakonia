app.controller('userEditCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.button = "Atualizar Usuário";
    $scope.emailField = false;
    //console.log(post['name']);
    $scope.usuario = {};
    $scope.usuario.name = post['name'];
    $scope.usuario.email = post['email'];
    $scope.usuario.telefone = post['telefone'];
  }
]);
