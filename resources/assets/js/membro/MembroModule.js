var app = angular.module('membrosRecord', ['ngMessages','ngSanitize'
    ,'ui.mask','remoteValidation', 'ngResource', 'comum','ngTagsInput','ui.bootstrap'])
  .config(['$interpolateProvider', function ($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
}]);

app.controller('membrosIndexController', ['$scope', '$http', '$resource',
  function ($scope, $http, $resource) {
    $scope.membros = [];

    var regioes = $resource('/regioes');
    console.log( regioes.query() );

    $http.get("/membro").then(function(response) {
        $scope.membros = response.data;
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

    $scope.filtroRegioes = function(regioes){
        return function( item ){
            if( typeof regioes == 'undefined' || regioes.length == 0 ){
                return true;
            }
            var i = regioes.length;
            while( i-- ){
                if( regioes[i]['nome'] === item.regiao ){
                    return true;
                }
            }
            return false;
        }
    };

    $scope.filtroGrupos = function(grupos){
        return function( item ){
            if( typeof grupos == 'undefined' || grupos.length == 0 ){
                return true;
            }
            var i = grupos.length;
            while( i-- ){
                if( grupos[i]['id'] === item.grupo_caseiro_id ){
                    return true;
                }
            }
            return false;
        }
    };

    $scope.loadRegioesTags = function(query) {
        return $http.get('/regioes', {cache: true}).then( function(response){
            var regioes = response.data;
            return regioes.filter(
                function( regiao ){
                    return regiao.nome.toLowerCase().indexOf(query.toLowerCase()) != -1;
                });
            });
    };

    $scope.loadGruposTags = function(query) {
        return $http.get('/membro/grupo-caseiro/lista', {cache: true}).then( function(response){
            var grupos = response.data;
            return grupos.filter(
                function( grupo ){
                    return grupo.nome.toLowerCase().indexOf(query.toLowerCase()) != -1;
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
      var vm = this;
    vm.focus = false;
    $scope.button = "Cadastrar Membro";
    $scope.edit = false;

    $http.get("/membro/grupo-caseiro/lista").then(function(response) {
        $scope.grupos = response.data;
    });

    $http.get("/regioes").then(function(response) {
        $scope.regioes = response.data;
    });
    $scope.membro = {};
    $scope.membro.avatar_path = '/img/membro/000-default-homem-70px.jpg';

    $scope.dateOptions = {
        dateDisabled: false,
        formatYear: 'yyyy',
        showWeeks: false,
        maxDate: new Date(),
        startingDay: 1
    };

  }
]);

app.controller('membroEditCtrl', ['$scope', '$http', '$location',
  function ($scope, $http,$location) {
    $scope.button = "Atualizar Membro";
    $scope.edit = true;

    $http.get("/membro/grupo-caseiro/lista").then(function(response) {
        $scope.grupos = response.data;
    });

    $http.get("/regioes").then(function(response) {
        $scope.regioes = response.data;
    });

    $http.get("/membro/" + post["id"] + "/relacionamentos/igreja").then( function(response){
        $scope.relacionamentosIgreja = response.data;
    });

    $http.get("/membro/" + post["id"] + "/relacionamentos/familia").then( function(response){
        $scope.relacionamentosFamilia = response.data;
    });

    $scope.userShowLink = function( membro ){
        return window.location.origin + '/membro/' + membro + '/edit';
	};

    $scope.membro = {};
    $scope.membro.nome = post['nome'];
    $scope.membro.grupo_caseiro_id = post['grupo_caseiro_id'];
    $scope.membro.sexo = post['sexo'];
    var dia = moment(post['data_nascimento'],"Y-MM-DD").toDate();
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