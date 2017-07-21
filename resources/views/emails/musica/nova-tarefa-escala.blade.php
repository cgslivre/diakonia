@component('mail::message')
Escala de Música
========
**{{$tarefa->colaborador->user->name}}**, você foi incluído(a) na escala do evento abaixo:

## Evento
**{{$tarefa->escala->evento->titulo}}**, dia **
  {{$tarefa->escala->evento->data_hora_inicio->format('d/m/Y')}}** às **
  {{$tarefa->escala->evento->data_hora_inicio->format('G\hi')}}**.

## Serviço
**{{$tarefa->servico->descricao}}**

Se, por algum motivo, você não pode participar da escala neste dia, avise o
líder clicando no link abaixo:
{{--  Ver escala --}}
@component('mail::button',['url' => config('app.url') . '/musica/escala/impedimento/' .
  $tarefa->escala->token . $tarefa->colaborador->token, 'color'=>'red' ])
Informar impedimento
@endcomponent



@endcomponent
