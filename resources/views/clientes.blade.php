<x-layouts.app
    title="Clientes"
    >

    <h1>Página de Clientes</h1>
    @foreach ($clients as $client)
        {{ $client->name }}
    @endforeach
</x-layouts.app>
