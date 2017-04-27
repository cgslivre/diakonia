@component('mail::message')
# Novo usuário registrado no sistema

Usuário **{{$user->name}}** foi criado às {{$user->created_at->format('G\hi\m\i\n')}} do dia {{$user->created_at->format('d/m/Y')}}.

* Usuário: **{{$user->name}}**
* Email: **{{$user->email}}**

@component('mail::button',['url'=>config('app.url') . '/usuario/' . $user->id . '/permissoes'])
Acessar painel de permissões do usuário
@endcomponent



@endcomponent
