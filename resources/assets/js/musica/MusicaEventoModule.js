var app = angular.module('musicaEventosRecord', ['ngMessages','ngSanitize','remoteValidation'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);

var dateFormat = function() {
    return {
        // limit usage to argument only
        restrict: 'A',
        require: "ngModel",

        link: function(scope, element, attr, ctrl) {
            // please note you can name your function & argument anything you like
            function customValidator(ngModelValue) {

                var valid = moment(ngModelValue,'D/M/YYYY H:mm', true);
                console.log(ngModelValue + ": " +valid.isValid());
                if (valid.isValid()) {
                    ctrl.$setValidity('formato', true);
                } else {
                    ctrl.$setValidity('formato', false);
                }

                return ngModelValue;
            }

            ctrl.$parsers.push(customValidator);
        }
    };
};

app.directive("dateFormat", dateFormat);