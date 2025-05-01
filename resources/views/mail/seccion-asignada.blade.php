<x-mail::message>
# Hola {{ $alumno->nombre }}

Se te han asignado las secciones:

@foreach ($secciones as $seccion)
- **{{ $seccion->nombre }}**
@endforeach

<x-mail::button :url="route('alumno.show', $alumno->id)">
Ver mi perfil
</x-mail::button>

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
