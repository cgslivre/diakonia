@extends( 'membro.template-membro')

@section('nivel2', '<li class="active">Regiões</li>')

@section('content')
    @can('membro-regiao-create')
    {!! Form::open(array('route'=>'regiao.store','class'=>'form-inline')) !!}
    <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
        {!! Form::label('nome', 'Nome da região:' , ['class'=>'control-label'])!!}

        {!! Form::text('nome', null ,['class'=>'form-control','placeholder'=>'Nome da região'])!!}
        @if ($errors->has('nome'))
            <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif


    </div>
    {!! Form::submit('Adicionar',['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
    @endcan

    <hr class="divider">

    <?php $i=1 ?>
    @if (count($regioes) > 0 )

        <div class="row width-90">



            @foreach( $regioes as $chunk )
                <div class="col-md-4">
                    <table class="table table-striped table-hover regiao">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                @can('membro-regiao-remove')<th>Remover</th>@endcan
                            </tr>
                        </thead>
                        <tbody>

                            @foreach( $chunk as $regiao )
                            <tr class="grupo-ativo">
                                <th scope="row" title="{{ $regiao->id }}">{{$i++}}</th>
                                <td class="nome-grupo">{{ $regiao->nome }}</td>
                                @can('membro-regiao-remove')<td>
                                    {{ Form::open([ 'method'  => 'delete',
                                        'route' => [ 'regiao.destroy', $regiao->id ] ]) }}
                                        {{ Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>',
                                            ['class' => 'btn btn-danger','type'=>'submit']) }}
                                            {{ Form::close() }}
                                        </td>@endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>


        @else
            Nenhum registro.
        @endif


    @endsection
