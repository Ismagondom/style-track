<x-layouts.app title="Colores">

    <h1>Página de Colores</h1>
    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
    @foreach ($colors as $color)
        <div>
            {{ $color->name }}
            <form action="{{ route('deleteColor', ['id' => $color->id]) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>
            </form>
        </div>
    @endforeach

    <form action="{{ route('storeColor') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <button type="submit">Añadir</button>
    </form>
    <a href="{{ route('configuracion') }}">Regresar</a>

</x-layouts.app>
