<!--Se crea una plantilla markdown con el parámetro make:mail Mailable -m -->
@component('mail::message')
# Tus credenciales para acceder a {{ config('app.name') }}

Utiliza estas credenciales para acceder al sistema

@component('mail::table')
    | Username | Contraseña |
    |:----------|:------------|
    | {{ $user->email }} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Entrar
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
