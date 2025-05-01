<h1>Detalles de la Sección: {{ $seccion->nombre }}</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<h2>Alumnos Inscritos:</h2>
@if ($alumnosInscritos->count() > 0)
    <ul>
        @foreach ($alumnosInscritos as $alumno)
            <li>{{ $alumno->nombre }}</li>
        @endforeach
    </ul>
@else
    <p>No hay alumnos inscritos en esta sección.</p>
@endif

<h2>Inscribir Alumnos</h2>
<form action="{{ route('secciones.asignarAlumnos', $seccion) }}" method="POST">
    @csrf
    <div>
        <label for="alumnos">Seleccionar Alumnos:</label><br>
        @if ($alumnos->count() > 0)
            @foreach ($alumnos as $alumno)
                <input type="checkbox" name="alumnos[]" value="{{ $alumno->id }}"> {{ $alumno->nombre }}<br>
            @endforeach
        @else
            <p>No hay alumnos disponibles para inscribir.</p>
        @endif
    </div>
    <button type="submit">Asignar Alumnos</button>
</form>

<a href="{{ route('secciones.index') }}">Volver a la lista de secciones</a>