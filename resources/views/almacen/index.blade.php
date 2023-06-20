<x-layouts.app title="Almacén">
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <a href="{{ route('nuevoproducto') }}"
        class="bg-gray-900 text-gray-400 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white ">Nuevo
        Producto</a>
    @foreach ($products as $product)
        <ul role="list" class="divide-y divide-gray-100">
            <a href="/producto/{{ $product->id }}">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('images/ropaIcon.png') }}"
                            alt="Icono-Ropa">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $product->name }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $product->description }}</p>
                        </div>
                    </div>
                    @php
                    $productSizes = \App\Models\ProductSize::where('product_id', $product->id)->get();
                    @endphp
                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">Cantidades</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500">
                            @foreach ($productSizes as $sizeP)
                                {{ $sizeP->size->name }}
                                @if ($sizeP->quantity == 0)
                                    <span class="text-red-500">{{ $sizeP->quantity }}</span>
                                @else
                                    {{ $sizeP->quantity }}
                                @endif
                                |
                            @endforeach
                        </p>

                    </div>
                </li>
            </a>
        </ul>
    @endforeach

</x-layouts.app>
