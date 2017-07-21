@component('mail::message')
Escala de Música - Líder não pode participar
========
**{{$admin->name}}**, o líder **{{$impedimento->colaborador->user->name}}** foi selecionado para o evento abaixo, mas **não poderá participar**.

## Evento
**{{$impedimento->escala->evento->titulo}}**, dia **
  {{$impedimento->escala->evento->data_hora_inicio->format('d/m/Y')}}** às **
  {{$impedimento->escala->evento->data_hora_inicio->format('G\hi')}}**.

Acesse o sistema para tratar este impedimento:

  @component('mail::button',['url' => config('app.url') . '/musica/escala/' .
    $impedimento->escala->id . '/edit'])
  Alterar escala
  @endcomponent



@endcomponent
