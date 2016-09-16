var app = angular.module('musicaStaffRecord', ['ngMessages','ngSanitize','remoteValidation','ui.select'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>')


}]);

app.directive("toggleClass", function() {
  return {
    link: function($scope, element, attr) {
      element.on("click", function() {
        element.toggleClass("option-selected");
      });
    }
  }
});
