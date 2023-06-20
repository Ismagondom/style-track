<x-layouts.app title="Crear Producto">
    <h1>Producto Nuevo</h1>
    <p>Si desea ingresar un nuevo color, proveedor, categoria, o añadir tallas nuevas, recuerde que debe configurar la
        aplicación en el menú configuración.</p>
    <form action="{{ route('guardarproducto') }}" method="POST">
        @csrf
        <!--Siempre que usemos un formulario en laravel debemos usar esta etiqueta para evitar ataques csrf-->

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}" required>
        <br>
        @error('name')
            <small style="color: red">{{$message}}</small>
            <br>
        @enderror
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required>{{old('description')}}</textarea>
        <br>
        @error('name')
        <small style="color: red">{{$message}}</small>
        <br>
    @enderror
        <label for="cost">Costo:</label>
        <input type="number" step="0.01" id="cost" name="cost" value="{{old('cost')}}" required>
        <br>
        @error('name')
        <small style="color: red">{{$message}}</small>
        <br>
    @enderror
        <label for="price">Precio:</label>
        <input type="number" step="0.01" id="price" name="price" value="{{old('price')}}"required>
        <br>
        @error('name')
        <small style="color: red">{{$message}}</small>
        <br>
    @enderror
        <!--TODOIT, subida de imagenes
    <label for="image">Imagen:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    <br>
    -->
        <label for="provider">Proveedor:</label>
        <select id="provider" name="provider" required value="{{old('provider')}}"required>
            @foreach ($providers as $provider)
                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="provider">Color:</label>
        <select id="color" name="color" required>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="provider">Categoria:</label>
        <select id="category" name="category" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>

        @foreach ($sizes as $size)
        <label>
            <input type="checkbox" name="sizes[]" value="{{ $size->id }}">
            {{ $size->name }}
        </label>
        <br>
    @endforeach
        <button type="submit">Guardar</button>

    </form>
    </x-layoutsapp>
