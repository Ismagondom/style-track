<x-layouts.app title="Crear Producto">
    <h1>Producto Nuevo</h1>
    <p>Si desea ingresar un nuevo color, proveedor, categoria, o añadir tallas nuevas, recuerde que debe configurar la
        aplicación en el menú configuración.</p>
    <form action="{{ route('updateproducto', $product) }}" method="POST">
            @csrf
            @method('PATCH')   <!--Tenemos que enviar el metodo asi ya que los navegadores solo aceptan get y post-->
            <!--Siempre que usemos un formulario en Laravel, debemos usar esta etiqueta para evitar ataques CSRF-->

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            <br>
            @error('name')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror

            <label for="description">Descripción:</label>
            <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
            <br>
            @error('description')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror

            <label for="cost">Costo:</label>
            <input type="number" step="0.01" id="cost" name="cost" value="{{ old('cost', $product->cost) }}" required>
            <br>
            @error('cost')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror

            <label for="price">Precio:</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required>
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
        <label for="provider">Proveedor:</label>
        <select id="provider" name="provider" required>
            @foreach ($providers as $provider)
                <option value="{{ $provider->id }}" {{ $provider->id == $product->provider_id ? 'selected' : '' }}>
                    {{ $provider->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="color">Color:</label>
        <select id="color" name="color" required>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}" {{ $color->id == $product->color_id ? 'selected' : '' }}>
                    {{ $color->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="category">Categoria:</label>
        <select id="category" name="category" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="sizes[]">Añadir nuevas tallas:</label><br>

        @foreach ($sizes as $size)
            <input type="checkbox" name="sizes[]" value="{{ $size->id }}">
            {{ $size->name }}
        </label>
        <br>
    @endforeach
    <label for="sizeQuantity">Cantidades en almacén de las tallas:</label>

    @foreach ($productSizes as $sizeP)
    <tr name="sizeQuantity">
        <td>{{ $sizeP->size->name }}</td>
        <td>
            <input type="number" name="sizes[{{ $sizeP->id }}]" value="{{ old('sizes.'.$sizeP->id, $sizeP->quantity) }}" required>
            @error('sizes.'.$size->id)
                <small style="color: red">{{ $message }}</small>
            @enderror
        </td>
    </tr>
@endforeach
        <br><button type="submit">Guardar</button>

    </form>
    </x-layoutsapp>
