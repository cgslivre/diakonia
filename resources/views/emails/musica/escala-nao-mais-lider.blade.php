@component('mail::message')
Escala de Música
========
**{{$antigoLider->user->name}}**, você foi não é mais o líder da escala do evento abaixo:

## Evento
**{{$escala->evento->titulo}}**, dia **
  {{$escala->evento->data_hora_inicio->format('d/m/Y')}}** às **
  {{$escala->evento->data_hora_inicio->format('G\hi')}}**.

O novo líder da escala é **{{$escala->lider->user->name}}**



@endcomponent
