@component('mail::message')
# Novo usuário registrado

The body of your message.

@component('mail::panel')
Painel
@endcomponent

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
