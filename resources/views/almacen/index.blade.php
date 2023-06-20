<x-layouts.app
    title="Almacén"
    >

    <h1>Página de Almacén</h1>
    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
    <a href={{route('nuevoproducto')}}>Nuevo Producto</a>
    @foreach ($products as $product)
    <div name= "producto">    <a href="/producto/{{$product->id}}">
        {{ $product->name }}</a></div>
    @endforeach
</x-layoutsapp>
