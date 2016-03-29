var app = angular.module('usuariosRecord', ['ngSanitize','ui.mask'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);
