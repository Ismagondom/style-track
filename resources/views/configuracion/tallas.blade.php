<x-layouts.app title="Tallas">

    <h1>Página de Tallas</h1>
    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
    @foreach ($sizes as $size)
        <div>
            {{ $size->name }}
            <form action="{{ route('deleteSize', ['id' => $size->id]) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>
            </form>
        </div>
    @endforeach

    <form action="{{ route('storeSize') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <button type="submit">Añadir</button>
    </form>
    <a href="{{ route('configuracion') }}">Regresar</a>

</x-layouts.app>

