<x-layouts.app title="Colores">

    <h1>Página de Colores</h1>
    @foreach ($colors as $color)
        {{ $color->name }}
    @endforeach
</x-layouts.app>
