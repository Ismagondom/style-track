<x-layouts.app
    title="Producto"
    >

    <h1>Página de Producto {{$product->name}}</h1>
    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
    <a href="/producto/{{$product->id}}/edit">Editar</a>
    <a href={{ route('almacen') }}>Regresar</a>


</x-layouts.app>
