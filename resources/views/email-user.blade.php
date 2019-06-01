@component('mail::message')
# Introduction

Bem vindo {{$user->name}},

Para poder utilizar os nossos serviços, terá de ativar a sua conta.
Poderá faze-lo clicando no link seguinte.

@component('mail::button', ['url' => route('email.verify', $user->id)])
    Ativar conta
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
