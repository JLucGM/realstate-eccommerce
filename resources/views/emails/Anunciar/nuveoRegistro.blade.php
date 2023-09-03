@component('mail::message')
# Nuevo Registro para publicar

Hola felicitaciones {{ $user->name }} te has registrado en la plataforma paa inciar la prueba mediante la publicacion de tus propiedades <br>

tu correo de acceso : {{ $user->email }} <br>
tu clave de acceso : {{ $password }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Inmobiliaria
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
