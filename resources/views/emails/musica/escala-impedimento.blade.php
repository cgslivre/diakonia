@component('mail::message')
Escala de Música - Escala precisa ser atualizada
========
**{{$lider->name}}**, {{$impedimento->colaborador->user->name}} **não** poderá participar do evento abaixo:

* Serviços: {{$impedimento->escala->tarefas->where('colaborador_id',$impedimento->colaborador_id)->map( function($tarefa){return $tarefa->servico->descricao;})->implode(', ')}}

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
