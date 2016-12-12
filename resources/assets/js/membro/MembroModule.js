var app = angular.module('membrosRecord', ['ngMessages','ngSanitize','ui.mask','remoteValidation', 'ngResource', 'comum','ngTagsInput'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);

app.controller('membrosIndexController', ['$scope', '$http', '$resource',
  function ($scope, $http, $resource) {
    $scope.membros = [];

    var regioes = $resource('/regioes');
    console.log( regioes.query() );

    $http.get("/membro").success(function(data) {
        $scope.membros = data;
    });

    $scope.userShowLink = function( membro ){
        return window.location.origin + '/membro/' + membro + '/edit';
	};

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

    $scope.loadTags = function(query) {
        return $http.get('/regioes', {cache: true}).then( function(response){
            var regioes = response.data;
            return regioes.filter(
                function( regiao ){
                    return regiao.nome.toLowerCase().indexOf(query.toLowerCase()) != -1;
                });
            });
    };

    $scope.validarTag = function( $tag ){
        if (typeof $tag.id != 'undefined'){
            return true;
        } else{
            return false;
        }
        
    }

}]);



app.controller('membroCreateCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.button = "Cadastrar Membro";
    $scope.edit = false;

    $http.get("/membro/grupo-caseiro/lista").success(function(data) {
        $scope.grupos = data;
    });

    $http.get("/regioes").success(function(data) {
        $scope.regioes = data;
    });
    $scope.membro = {};
    $scope.membro.avatar_path = '/img/membro/000-default-homem-70px.jpg';


  }
]);

app.controller('membroEditCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.button = "Atualizar Membro";
    $scope.edit = true;

    $http.get("/membro/grupo-caseiro/lista").success(function(data) {
        $scope.grupos = data;
    });

    $http.get("/regioes").success(function(data) {
        $scope.regioes = data;
    });

    $scope.membro = {};
    $scope.membro.nome = post['nome'];
    $scope.membro.grupo_caseiro_id = post['grupo_caseiro_id'];
    $scope.membro.sexo = post['sexo'];
    var dia = moment(post['data_nascimento']).format('D/M/YYYY');
    $scope.membro.data_nascimento = dia;

    var avatar = post['avatar_path'];
    if( avatar == null ){
        $scope.membro.avatar_path = $scope.membro.sexo == 'M' ?
            '/img/membro/000-default-homem-70px.jpg' : '/img/membro/000-default-mulher-70px.jpg';
    }
    $scope.membro.regiao = post['regiao'];
    $scope.membro.endereco = post['endereco'];
    $scope.membro.email = post['email'];
    $scope.membro.telefones = post['telefones_json'];

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
