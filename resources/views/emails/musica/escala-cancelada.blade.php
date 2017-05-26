@component('mail::message')
Escala de Música cancelada
========
**{{$user->name}}**, a escala do dia **{{$escala->evento->data_hora_inicio->format('d/m/Y')}}** foi cancelada.

## Evento
**{{$escala->evento->titulo}}**, dia **
  {{$escala->evento->data_hora_inicio->format('d/m/Y')}}** às **
  {{$escala->evento->data_hora_inicio->format('G\hi')}}**.



@endcomponent
