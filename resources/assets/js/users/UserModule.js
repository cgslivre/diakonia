var app = angular.module('usuariosRecord', ['ngMessages','ngSanitize','ui.mask','remoteValidation'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);
