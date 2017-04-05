@extends( 'membro.template-membro')
@section('nivel2', '<li><a href="/membros/consulta">Consulta de Membros</a></li>')
@section('nivel3', '<li>Editando: '. $consulta->titulo.'</li>')

@section('titulo', 'Consulta: ' . $consulta->titulo)

@section('content')
    {{ Form::model($consulta, ['method' => 'PATCH'
        , 'action'=>['membro\ConsultaController@update',$consulta->id]
        , 'name'=>'consultaMembroForm'
        ]) }}
        @include('membro.consulta.form')
    {{ Form::close() }}
    <hr/>
    <div class="dados-consulta">
        <p>Título da consulta: <span><strong>{{$consulta->titulo}}</strong></span></p>
    </div>
    <p>Total de membros encontrados: <strong>{{$membros->count()}}</strong></p>
    <div class="tabela">
        <table class="table table-striped table-hover consulta-membros">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Grupo Caseiro</th>
                    <th>Idade</th>
                    <th>Região</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach( $membros as $membro )
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        <span class="sexo-{{$membro->sexo}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <a href="/membro/{{$membro->id}}/edit">{{$membro->nome}}</a>
                    </td>
                    @if($membro->grupo)
                        <td>
                            {{$membro->grupo->nome}}
                        </td>
                    @else
                        <td class="text-muted">Sem grupo</td>
                    @endif
                    <td title="{{$membro->data_nascimento->format('d/M/Y')}}">{{$membro->idade}}</td>
                    <td>{{$membro->regiao}}</td>
                    <td>{{$membro->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script>
    $(".select-regioes").select2({
      placeholder: "Selecione uma ou mais opções",
      allowClear: true
    });
    $(".select-grupos").select2({
      placeholder: "Selecione um ou mais grupos caseiros",
      allowClear: true
    });
</script>
@endsection
