var app = angular.module('musicaStaffRecord', ['ngMessages','ngSanitize','remoteValidation'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);
