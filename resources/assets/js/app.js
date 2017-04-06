/*$(function() {
  $(".app-container").toggleClass("expanded");
  $(".navbar-expand-toggle").click(function() {
    $(".app-container").toggleClass("expanded");
    return $(".navbar-expand-toggle").toggleClass("fa-rotate-90");
  });
  return $(".navbar-right-expand-toggle").click(function() {
    $(".navbar-right").toggleClass("expanded");
    return $(".navbar-right-expand-toggle").toggleClass("fa-rotate-90");
  });
});

$(function() {
  return $(".side-menu .nav .dropdown").on('show.bs.collapse', function() {
    return $(".side-menu .nav .dropdown .collapse").collapse('hide');
  });
});*/

$('.alert, hr.mensagem').not('.alert-important').delay(3000).slideUp(300);

function formatPhone( input ){
    if( input == null || input.length == 0 ){
        return '';
    } else{
        switch (input.length) {
            case 8:
                return input.slice(0,4) + '-' + input.slice(4,8);
            case 9:
                return input.slice(0,5) + '-' + input.slice(5,9);
            case 10:
                return '(' + input.slice(0,2) + ') ' + input.slice(2,6) + '-' + input.slice(6,10);
            case 11:
                return '(' + input.slice(0,2) + ') ' + input.slice(2,7) + '-' + input.slice(7,11);
            default:
                return input;
        }
    }
}

var comum = angular.module( 'comum', [])
comum.filter('highlight', ['$sce', function($sce) {
    return function(text, phrase) {

        if( phrase ){
            if( text ){
                text = text.replace(new RegExp('('+phrase+')', 'gi'),
                    '<span class="highlighted">$1</span>');
            }
        }
        return $sce.trustAsHtml(text);
    };
}]);

comum.filter('removeAcentos', function() {
  return function(items, criterioDeBusca) {
//      console.log('items >' + items);
//      console.log('tagName >' + criterioDeBusca);
    var clean = function(value) {
        return value
            .replace(/á/g, 'a')
            .replace(/ã/g, 'a')
            .replace(/ç/g, 'c')
            .replace(/é/g, 'e')
            .replace(/í/g, 'i')
            .replace(/ó/g, 'o')
            .replace(/ú/g, 'u');
        }
    var filtered = [];
    angular.forEach(items, function(el) {
        if( !criterioDeBusca){
            filtered.push(el);
        } else{
            var full = el.nome + ' ' + el.regiao + ' '
                + el.telefones + ' ' + el.email + ' ';
            var grupo  = el.grupo ? el.grupo.nome : '';
            full = full + grupo;
            full = clean(full.toLowerCase());
            var busca = clean( criterioDeBusca.toLowerCase());
            if( full.indexOf(busca) > -1 ){
                filtered.push(el);
            }            
        }
    });
    return filtered;
  }
});

comum.filter('formatPhone', ['$sce', function($sce) {
    return function(input) {
        var ret = input.toString();
        if( ret == null || ret.length == 0 ){
            return '';
        } else{
            switch (ret.length) {
                case 8:
                    return ret.slice(0,4) + '-' + ret.slice(4,8);
                case 9:
                    return ret.slice(0,5) + '-' + ret.slice(5,9);
                case 10:
                    return '(' + ret.slice(0,2) + ') ' + ret.slice(2,6) + '-' + ret.slice(6,10);
                case 11:
                    return '(' + ret.slice(0,2) + ') ' + ret.slice(2,7) + '-' + ret.slice(7,11);
                default:
                    return ret;
            }
        }
    };
}]);

comum.directive("compareTo", function() {
    return {
        require: "ngModel",
        scope: {
            otherModelValue: "=compareTo"
        },
        link: function(scope, element, attributes, ngModel) {

            ngModel.$validators.compareTo = function(modelValue) {
                return modelValue == scope.otherModelValue;
            };

            scope.$watch("otherModelValue", function() {
                ngModel.$validate();
            });
        }
    };
});

comum.directive("dateFormat", function(){
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
});
