<x-layouts.app title="Colores">

    <h1>Listado de colores. Aquí podrá agregar, y borrar colores que no estén en uso si lo desea.</h1><br>
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
        <div class="grid grid-cols-2 gap-4">
            @foreach ($colors as $color)
                <div
                    class="flex items-center justify-between px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
                    <span
                        class="text-lg font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">{{ $color->name }}</span>
                    <form action="{{ route('deleteColor', ['id' => $color->id]) }}" method="POST" style="display: inline"
                        class="ml-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-gray-900 text-gray-400 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Borrar</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800"
        action="{{ route('storeColor') }}" method="POST">
        @csrf
        <label for="name" class="flex flex-col">
            <span
                class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">
                Nombre:
            </span>
            <input
                class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                type="text" id="name" name="name" required>
            <br>
            <div class="flex items-center justify-between mt-4">

                <button type="submit"
                    class="bg-gray-900 text-gray-400 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white ">
                    Añadir Color</button>
                <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none"
                    href="{{ route('configuracion') }}">Regresar</a>
            </div>
    </form>


</x-layouts.app>
