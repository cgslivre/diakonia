{{ Date::setLocale('pt_BR') }}
@extends( 'vendor.mail.html.diakonia.layout')
@section('content')
    <p>Olá, <strong>{{$user->name}}</strong></p>
    @if( $user->id == $escala->lider_id )
        <p>Você foi selecionado(a) para ser o <strong>líder</strong> da escala de música:</p>
    @else
        <p>Você foi selecionado(a) para a escala de música:</p>
    @endif

    <h2>Evento</h2>
    <p class="evento"><span>{{$escala->evento->titulo}}</span></p>
    <p class="evento"><span>Data:</span> {{title_case(Date::parse($escala->evento->data_hora_inicio)->format('l, j / F / Y'))}}</p>
    <p class="evento"><span>Hora:</span> {{Date::parse($escala->evento->data_hora_inicio)->format('G\hi')}}</p>

    <h2>Escala</h2>
    <table class="escala">
        <tr class="lider {{$escala->lider_id == $user->id ? 'escalado' : ''}}">
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
        <tr class="{{$loop->index % 2 == 0 ? 'even' : 'odd'}} {{
            $tarefas->contains('colaborador_id',$user->id) ? ' escalado' : ''
        }}">
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
    <hr/>
    <h2>Em caso de impedimento:</h2>

    <p>Se, por algum motivo, você não pode participar da escala neste dia, avise o <strong>
        {{ $user->id == $escala->lider_id ? "administrador" : "líder"}}
    </strong> clicando no link abaixo.</p>

    @include('vendor.mail.html.diakonia.button', [
        'url' => config('app.url') . '/musica/escala/impedimento/' . 
          $escala->token . $user->colaboradorMusica->token,
        'color' => 'red',
        'slot' => 'Informar impedimento'
    ])

@endsection
