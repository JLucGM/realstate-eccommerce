@component('mail::message')
# Nuevo Registro Para Publicar

Hola se ha detectado un nuevo registro para hacer publicaciones desde la web <br>
El usuario registrado es e siguiente: {{ $user->name }} <br>
Mensaje dejado : {{ $mensaje }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Inmobiliaria
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
