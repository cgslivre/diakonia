var app = angular.module('musicaEscalaRecord', ['ngMessages','ngSanitize','remoteValidation'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);
