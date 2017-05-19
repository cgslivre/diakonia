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
    <table class="escala">
        <tr class="lider">
            <td class="servico-img">
                <img alt="Líder"
                src="{{URL('img/musica/lider.svg')}}"/>
            </td>
            <td class="servico-dsc">Líder</td>
            <td class="colaboradores">
                {{$escala->lider->user->name}}
            </td>
        </tr>
        @foreach ($escala->tarefas->sortBy('servico_id')->groupBy('servico_id') as $tarefas)
        <tr class="{{$loop->index % 2 == 0 ? 'even' : 'odd'}}">
            <td class="servico-img">
                <img alt="{{ $tarefas->first()->servico->descricao }}"
                src="{{URL($tarefas->first()->servico->iconeSmall)}}"/>
            </td>
            <td class="servico-dsc">
                {{ $tarefas->first()->servico->descricao }}
            </td>
            <td class="colaboradores">
                {{$tarefas->map(function($item){return $item->colaborador->user->name;})->implode(', ')}}
            </td>
        </tr>

        @endforeach
    </table>
@endsection
