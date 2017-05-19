{{ Date::setLocale('pt_BR') }}
@extends( 'vendor.mail.html.diakonia.layout')
@section('content')
    <p>Olá, <strong>{{$user->name}}</strong></p>
    <p>Você foi selecionado(a) para a escala de música:</p>

    <h2>Evento</h2>
    <p class="evento"><span>{{$escala->evento->titulo}}</span></p>
    <p class="evento"><span>Data:</span> {{title_case(Date::parse($escala->evento->data_hora_inicio)->format('l, j / F / Y'))}}</p>
    <p class="evento"><span>Hora:</span> {{Date::parse($escala->evento->data_hora_inicio)->format('G\hi')}}</p>

    <h2>Escala</h2>
    <table>
        @foreach ($escala->tarefas->sortBy('servico_id')->groupBy('servico_id') as $tarefas)
        <tr>
            <td>
                {{$tarefas->first()->servico->descricao}}
            </td>
            <td>
                {{$tarefas->map(function($item){return $item->colaborador->user->name;})->implode(', ')}}
            </td>
        </tr>

        @endforeach
    </table>
@endsection
