
@component('mail::message')
# Nuevo Contacto

Hola Hay un nuevo contacto en el sistema y hay un nuevo mensaje de soporte abierto <br>
El usuario registrado es e siguiente: {{ $user->name }} <br>
Mensaje dejado : {{ $mensaje }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Inmobiliaria
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
