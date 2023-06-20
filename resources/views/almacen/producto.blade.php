<x-layouts.app
    title="Producto"
    >
    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
    <h1>Página de Producto {{$product->name}}</h1>
    <a href="/producto/{{$product->id}}/edit">Editar</a>
    <a href={{ route('almacen') }}>Regresar</a>


</x-layouts.app>
