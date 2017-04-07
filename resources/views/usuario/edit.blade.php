@extends( 'usuario.template-usuario')
@if($perfil)
    @section('nivel2')<li class="active">Editar perfil</li>@stop
@else
    @section('nivel2')<li class="active">Editar usuário</li>@stop
@endif



@section('content')
<!--
<ol class="breadcrumb">
  <li><a href="#">Usuários</a></li>
  <li class="active">Editar Usuário</li>
</ol>
-->
<div class="container-fluid" ng-app="usuariosRecord" ng-controller="userEditCtrl">
    {{ Form::model($user, ['method' => 'PATCH' , 'action'=>[$perfil?'UsuarioController@atualizaPerfil':'UsuarioController@update',$user->id]
        ,'files' => true, 'name'=>'usuarioForm'
        , 'class'=> 'form-horizontal']) }}
        @include('usuario.form',['userAvatar'=>$user->avatarPathMedium()
            , 'submitButton'=>'Atualizar usuário'
            , 'readony'=>'readonly'
            , 'regiao'=>$user->regiao
            , 'passwordForm'=>false])
    {{ Form::close() }}
    <hr/>
    @can('user-permissions')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group ">
                    <label class="col-sm-2 control-label text-right"><a class="btn btn-info"
                    href="{{action('UsuarioPermissoesController@edit', ['id' => $user->id])}}"
                    role="button">Permissões</a></label>
                  <div class="col-sm-4">
                    @include('usuario.permissons-labels')
                  </div>
                </div>
            </div>
        </div>


    @endcan



    @unless($perfil)
        @can('user-remove')

        {{ Form::model($user, ['method' => 'DELETE' , 'action'=>['UsuarioController@destroy',$user->id],
            'id'=>'deleteForm']) }}
            {{ Form::submit('Remover usuário', ['class' => 'btn btn-danger'
                ,'data-toggle'=>'modal', 'data-target'=>'#modalWarning']) }}

            <!-- Modal -->
            <div class="modal fade modal-danger" id="modalWarning" tabindex="-1"
                  role="dialog" aria-labelledby="modal-ativacao" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header modal-header-danger">
                            <button type="button" class="close"
                              data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-ativacao">Confirmação</h4>
                        </div>
                        <div class="modal-body">
                            Deseja remover o usuário {{ $user->name }}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
                            <button type="button" class="btn btn-danger" id="confirmAtivacao">Sim</button>
                        </div>
                    </div>
                </div>
            </div>

        {{ Form::close() }}
        @endcan
    @endunless



</div>

@section('scripts')
<script>
    var post = {!! $user !!};
</script>

<script>
    var confirmacao = false;
    $('#deleteForm').submit( function(e){

      if( confirmacao){return;}
      e.preventDefault();

    });

    $('#confirmAtivacao').click(function(){
      confirmacao = true;
      var formId = $(this).attr('formId');
      console.log(formId);
      $('#deleteForm').submit();

    });
</script>

<script src="{{ url('js/users/app-users-module.min.js') }}"></script>

@endsection

@endsection
