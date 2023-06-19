<x-layouts.app
    title="Almacén"
    >

    <h1>Página de Almacén</h1>
    @foreach ($products as $product)
    <div name= "producto">    <a href="/producto/{{$product->id}}">
        {{ $product->name }}</a></div>
    @endforeach
</x-layoutsapp>
