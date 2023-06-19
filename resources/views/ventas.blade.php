<x-layouts.app
    title="Ventas"
    >

    <h1>Página de Ventas</h1>
    @foreach ($sales as $sale)
        {{ $sale->name }}
    @endforeach
</x-layouts.app>


