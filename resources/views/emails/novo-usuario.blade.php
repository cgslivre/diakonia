@component('mail::message')
# Novo usuário registrado no sistema

Usuário **{{$user->name}}** foi criado às {{$user->created_at->format('G\hi\m\i\n')}} do dia {{$user->created_at->format('d/m/Y')}}.

* Usuário: **{{$user->name}}**
* Email: **{{$user->email}}**
* Telefone: **{{$user->telefone}}**

@component('mail::button',['url'=>config('app.url')])
Acessar painel de permissões do usuário
@endcomponent



@endcomponent
