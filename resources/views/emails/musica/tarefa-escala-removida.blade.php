@component('mail::message')
Escala de Música
========
**{{$tarefa->colaborador->user->name}}**, você foi removido(a) do serviço **{{$tarefa->servico->descricao}}** na escala do evento abaixo:

## Evento
**{{$tarefa->escala->evento->titulo}}**, dia **
  {{$tarefa->escala->evento->data_hora_inicio->format('d/m/Y')}}** às **
  {{$tarefa->escala->evento->data_hora_inicio->format('G\hi')}}**.



@endcomponent
