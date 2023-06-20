<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Provider;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlmacenController extends Controller
{
    function index()
    {

        $products = Product::get();
        return view('almacen.index', ['products' => $products]);
    }
    function show(Product $id)
    { //si especificamos que la variable que recibe es un post, no hace falta hacer el find, lo hace laravel internamente
        //$product = Product::findOrFail($id);    //findOrFail hace que si no lo encuentra nos da el error 404 File not Found
        return view('almacen.producto', ['product' => $id]);
    }


    function create()
    {
        //primero vamos a cargar todos los colores, proveedores y categorias para poder rellenar el formulario.
        $colors = Color::get();
        $providers = Provider::get();
        $categories = Category::get();
        $sizes = Size::get();
        return view('almacen.create', compact('colors', 'providers', 'categories', 'sizes'));
    }


    function store(Request $request)
    {

        if (!Product::where('name', $request->name)->exists()) {
            $p = new Product();
            $p->name = $request->name;
            $p->description = $request->description;
            $p->cost = $request->cost;
            $p->price = $request->price;

            /* -------TODOIT-----
        * me falla la carga de fotos.
        $rutaImagen = '';
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $extension = $imagen->getClientOriginalExtension();
            $nombreImagen = Str::slug($request->input('name')) . '.' . $extension;
            $rutaImagen = $imagen->storeAs('imagenes_productos', $nombreImagen, 'public');
        }
        $p->photo_path = $rutaImagen;
        echo $p->photo_path;
        */

            $p->photo_path = 'ruta_imagen';
            $p->category_id =   $request->category;
            $p->provider_id =   $request->provider;
            $p->color_id =   $request->color;
            $sizes = $request->input('sizes');
            $p->save();
            if (!empty($sizes)) {
                $this->addProductSize($p->id, $sizes);
            } else {
                // No se seleccionó ninguna opción
                echo 'No se seleccionó ninguna talla';
            }
            echo $p;
            //Ahora creamos las diferentes tallas en 0.
        }
    }


    function addProductSize($product_id, $size_ids)
    {
        //Si la conbinacion de product_id y size_id existe no lo crea, si no, lo crea.
        foreach ($size_ids as $size_id) {
            ProductSize::firstOrCreate([
                'product_id' => $product_id,
                'size_id' => $size_id
            ]);
        }
    }
}
