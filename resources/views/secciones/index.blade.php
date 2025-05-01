<h1>Lista de Secciones</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('secciones.create') }}">Crear Nueva Sección</a>

@if ($secciones->count() > 0)
    <ul>
        @foreach ($secciones as $seccion)
            <li>
                {{ $seccion->nombre }}
                <a href="{{ route('secciones.show', $seccion) }}">Ver Detalles</a>
                <a href="{{ route('secciones.edit', $seccion) }}">Editar</a>
                <form action="{{ route('secciones.destroy', $seccion) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta sección?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay secciones creadas aún.</p>
@endif