<x-layouts.app title="Proveedores">

    <h1>Listado de Proveedores. Aquí podrá agregar, y borrar proveedores que no estén en uso si lo desea.</h1><br>
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
        @foreach ($providers as $provider)
            <div class="flex items-center px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
                <span
                    class="text-lg font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">{{ $provider->name }}</span>
                <span
                    class="text-sm underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">
                    | <a href="mailto:{{ $provider->email }}">{{ $provider->email }}</a></span>
                <span
                    class="text-sm underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">
                    | <a href="{{ $provider->website }}">{{ $provider->website }}</a></span>
                <span
                    class="text-sm  border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">
                    | {{ $provider->phone }}</span>
                <form action="{{ route('deleteProvider', ['id' => $provider->id]) }}" method="POST"
                    style="display: inline" class="ml-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-gray-900 text-gray-400 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Borrar</button>
                </form>
            </div>
        @endforeach
    </div>

    <form action="{{ route('storeProvider') }}" method="POST"
        class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800">
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
            <label for="email" class="flex flex-col">
                <span
                    class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">
                    Email:
                </span>
                <input
                    class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                    type="email" id="email" name="email" required>
                <br>
                <label for="website" class="flex flex-col">
                    <span
                        class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">
                        Website:
                    </span>
                    <input
                        class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                        type="text" id="website" name="website" required>
                    <br>
                    <label for="phone" class="flex flex-col">
                        <span
                            class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">
                            Phone:
                        </span>
                        <input
                            class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                            type="text" id="phone" name="phone" required>
                        <br>
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit"
                                class="bg-gray-900 text-gray-400 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white ">
                                Añadir</button>
                            <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none"
                                href="{{ route('configuracion') }}">Regresar</a>
                        </div>
    </form>
</x-layouts.app>
