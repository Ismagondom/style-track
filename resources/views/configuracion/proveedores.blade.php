<x-layouts.app title="Proveedores">

    <h1>Página de Proveedores</h1>
    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
    @foreach ($providers as $provider)
        <div>
            {{ $provider->name }}
            <form action="{{ route('deleteProvider', ['id' => $provider->id]) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>
            </form>
        </div>
    @endforeach

    <form action="{{ route('storeProvider') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="website">Website:</label>
        <input type="website" id="website" name="website" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <br>
        <button type="submit">Añadir</button>
    </form>
    <a href={{ route('configuracion') }}>Regresar</a>
</x-layouts.app>
