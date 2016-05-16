@extends( 'musica.template-musica')

@section('nivel2', '<li class="active"><a href="/musica/staff">Equipe</a></li>')
@section('nivel3', '<li class="active">Atualizar membro da equipe de música</li>')


    @section('content')

        <div class="container-fluid">
            {{ Form::model($staff, ['method' => 'PATCH',
                'action' => ['MusicaStaffController@update',$staff->id],
                'class'=> 'form-horizontal',
                'name'=>'musicaStaffForm']) }}

                <div class="form-group">
                    <div class="col-sm-2 text-right">
                    <img src="{{ URL($staff->user->avatarPathSmall()) }}" alt="" />
                    </div>
                  <div class="col-sm-4 name-title-2">
                      {{ $staff->user->name }}
                  </div>
                </div>

                @include('musica.staff.form',[
                    'submitButton'=>'Atualizar'
                    ])

            
            {{ Form::close() }}
        </div>





    @endsection

    @section('scripts')

        <script type="text/javascript">
            $(document).ready(function() {
                $(".select-usuario-staff").select2({
                    placeholder: 'Escolha um dos usuários cadastrados',
                    allowClear: true,
                    width: '100%'
                });

                $(".image-picker").imagepicker({
                    show_label: true
                });
            });
        </script>

    @endsection
