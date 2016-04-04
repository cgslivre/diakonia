@extends( 'master')

@section('titulo', 'Editar usuário')


@section('content')

<div class="container-fluid" ng-app="usuariosRecord" ng-controller="userEditCtrl">
    {{ Form::model($user, ['method' => 'PATCH' , 'action'=>['UsuarioController@update',$user->id]
        ,'files' => true, 'name'=>'usuarioForm'
        , 'class'=> 'form-horizontal']) }}
        @include('usuario.form',['userAvatar'=>$user->avatarPathMedium()
            , 'submitButton'=>'Atualizar usuário'
            , 'readony'=>'readonly'
            , 'regiao'=>$user->regiao
            , 'passwordForm'=>false])
    {{ Form::close() }}


    {{ Form::model($user, ['method' => 'DELETE' , 'action'=>['UsuarioController@destroy',$user->id],
        'id'=>'deleteForm']) }}
        {{ Form::submit('Remover usuário', ['class' => 'btn btn-danger'
            ,'data-toggle'=>'modal', 'data-target'=>'#modalWarning']) }}

        <!-- Modal -->
        <div class="modal fade modal-danger bs-example-modal-sm" id="modalWarning" tabindex="-1"
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
