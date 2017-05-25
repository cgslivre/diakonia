@component('mail::message')
Escala de Música
========
**{{$tarefa->colaborador->user->name}}**, você foi incluído na escala do evento abaixo:

## Evento
**{{$tarefa->escala->evento->titulo}}**, dia **
  {{$tarefa->escala->evento->data_hora_inicio->format('d/m/Y')}}** às **
  {{$tarefa->escala->evento->data_hora_inicio->format('G\hi')}}**.

## Escala

{{--  Ver escala --}}
@component('mail::button',['url'=>config('app.url') . '/musica/escala/' . $tarefa->escala->id ])
Ver escala
@endcomponent



@endcomponent
