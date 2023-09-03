@component('mail::message')
# Nuevo Mensaje

Hola {{ $user->name }} tienes un nuevo mensaje en el chat del soporte de inmobiliaria por favor entra al enlace para responder <br>

{{ $mensaje }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
ir al chat
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
