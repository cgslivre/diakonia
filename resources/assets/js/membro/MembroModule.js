var app = angular.module('membrosRecord', ['ngMessages','ngSanitize','ui.mask','remoteValidation', 'comum'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);

app.controller('membrosIndexController', ['$scope', '$http',
  function ($scope, $http) {
    $scope.membros = [];
    $http.get("/membro").success(function(data) {

        $scope.membros = data;

    });

    $scope.avatarPathSmall = function( avatar, sexo ){
        if ( avatar === null ){
            if( sexo == 'F'){
                return window.location.origin + '/img/membro/000-default-mulher-70px.jpg';
            } else{
                return window.location.origin + '/img/membro/000-default-homem-70px.jpg';
        }
        } else{
            return window.location.origin  + '/' + avatar + '70px.jpg';
        }
	};

    $scope.ordenarPor = function( campo ){
		$scope.criterioDeOrdenacao = campo;
		$scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
	};

}]);

app.controller('membroCreateCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.button = "Cadastrar Membro";

    $http.get("/membro/grupo-caseiro/lista").success(function(data) {
        $scope.grupos = data;
    });

    $http.get("/regioes").success(function(data) {
        $scope.regioes = data;
    });

  }
]);

$(function(){
	$(document.body).on('click', '.changeType' ,function(){
		$(this).closest('.phone-input').find('.type-text').text($(this).text());
		$(this).closest('.phone-input').find('.type-input').val($(this).data('type-value'));
	});

	$(document.body).on('click', '.btn-remove-phone' ,function(){
		$(this).closest('.phone-input').remove();
	});

	$('.btn-add-phone').click(function(){
		var index = $('.phone-input').length + 1;

		$('.phone-list').append(''+
				'<div class="input-group phone-input">'+
					'<span class="input-group-btn">'+
						'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="type-text">Tipo:</span> <span class="caret"></span></button>'+
						'<ul class="dropdown-menu" role="menu">'+
							'<li><a class="changeType" href="javascript:;" data-type-value="celular">Celular</a></li>'+
							'<li><a class="changeType" href="javascript:;" data-type-value="residencial">Residencial</a></li>'+
							'<li><a class="changeType" href="javascript:;" data-type-value="comercial">Comercial</a></li>'+
						'</ul>'+
					'</span>'+
					'<input type="text" name="telefone['+index+'][numero]" class="form-control" placeholder="99999 9999" />'+
					'<input type="hidden" name="telefone['+index+'][tipo]" class="type-input" value="" />'+
					'<span class="input-group-btn">'+
						'<button class="btn btn-danger btn-remove-phone" type="button"><span class="glyphicon glyphicon-remove"></span></button>'+
					'</span>'+
				'</div>'
		);
	});
});
