var app = angular.module('usuariosRecord', ['ngMessages','ngSanitize','ui.mask','remoteValidation', 'comum'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);
