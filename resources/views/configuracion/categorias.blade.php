<x-layouts.app title="Categorias">

    <h1>Página de Categorias</h1>
    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
    @foreach ($categories as $category)
        <div>
            {{ $category->name }}
            <form action="{{ route('deleteCategory', ['id' => $category->id]) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>
            </form>
        </div>
    @endforeach

    <form action="{{ route('storeCategory') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Descripcion:</label>
        <input type="text" id="description" name="description" required>
        <br>
        <button type="submit">Añadir</button>
    </form>
    <a href={{ route('configuracion') }}>Regresar</a>
</x-layouts.app>
