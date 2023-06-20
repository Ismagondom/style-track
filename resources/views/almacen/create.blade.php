<x-layouts.app title="Crear Producto">
    <p>Si desea ingresar un nuevo color, proveedor, categoria, o añadir tallas nuevas, recuerde que debe configurar la
        aplicación en el menú configuración.</p>
    <br>
    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800"
        action="{{ route('guardarproducto') }}" method="POST">
        @csrf
        <!--Siempre que usemos un formulario en Laravel, debemos usar esta etiqueta para evitar ataques CSRF-->

        <label for="name" class="flex flex-col">
            <span
                class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Nombre:
            </span>

            <input
                class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                type="text" id="name" name="name" value="{{ old('name') }}" required>
            <br>
            @error('name')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror

            <label for="description" class="flex flex-col">
                <span
                    class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Descripción:
                </span>

                <textarea
                    class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                    id="description" name="description" required>{{ old('description') }}</textarea>
                <br>
                @error('description')
                    <small style="color: red">{{ $message }}</small>
                    <br>
                @enderror

                <label for="cost" class="flex flex-col">
                    <span
                        class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Coste:
                    </span>

                    <input
                        class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                        type="number" step="0.01" id="cost" name="cost" value="{{ old('cost') }}"
                        required>
                    <br>
                    @error('cost')
                        <small style="color: red">{{ $message }}</small>
                        <br>
                    @enderror

                    <label for="price" class="flex flex-col">
                        <span
                            class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Precio:
                        </span>

                        <input
                            class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                            type="number" step="0.01" id="price" name="price" value="{{ old('price') }}"
                            required>
                        <br>
                        @error('price')
                            <small style="color: red">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--TODOIT, subida de imagenes
    <label for="image">Imagen:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    <br>
    -->
                        <label for="provider" class="flex flex-col">
                            <span
                                class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Proveedor:
                            </span>

                            <select
                                class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                                id="provider" name="provider" required value="{{ old('provider') }}"required>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <label for="color" class="flex flex-col">
                                <span
                                    class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Color:
                                </span>

                                <select
                                    class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                                    id="color" name="color" required>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="category" class="flex flex-col">
                                    <span
                                        class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Categoria:
                                    </span>

                                    <select
                                        class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                                        id="category" name="category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label for="sizes[]"
                                        class="text-sm font-semibold border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none">Selecciona
                                        tallas: </label>
                                    <br>
                                    <div class="grid grid-cols-4 gap-4">
                                        @foreach ($sizes as $size)
                                            <div>
                                                <input
                                                    class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"
                                                    type="checkbox" name="sizes[]" value="{{ $size->id }}">
                                                <span>{{ $size->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="flex items-center justify-between mt-4">

                                        <button type="submit"
                                            class="bg-gray-900 text-gray-400 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white ">
                                            Guardar</button>
                                        <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none"
                                            href={{ route('almacen') }}>Regresar</a>
                                    </div>
    </form>
    </x-layoutsapp>
