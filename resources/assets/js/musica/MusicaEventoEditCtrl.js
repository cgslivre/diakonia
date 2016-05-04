app.controller('musicaEventoEditCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.evento = {};
    $scope.evento.titulo = post['titulo'];
    var h = moment(post['hora']).format('D/M/YYYY H:mm');
    $scope.evento.hora = h;
  }
]);
