<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Size;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    function index()
    {

        return view('configuracion.configuracion');
    }

    function indexColors()
    {

        $colors = Color::get();
        return view('configuracion.colors', ['colors' => $colors]);
    }

    function storeColor(Request $request)
    {

        $name =  $request->name;
        $color = Color::firstOrCreate(['name' => $name]);
        return redirect()->route('colores');
    }
    public function deleteColor($id)
    {
        $color = Color::findOrFail($id);
        if (Product::where('color_id', $id)->exists()) {
            return redirect()->route('colores')->with('mensaje', 'Color NO elminado ya que existe un producto con este color.');
        } else {
            $color->delete();
            return redirect()->route('colores')->with('mensaje', 'Color eliminado correctamente');
        }
    }
    function indexProviders()
    {

        $providers = Provider::get();
        return view('configuracion.proveedores', ['providers' => $providers]);
    }

    function storeProvider(Request $request)
    {

        $name =  $request->name;
        $email = $request->email;
        $website = $request->website;
        $phone = $request->phone;
        $provider = Provider::firstOrCreate([
            'name' => $name,
            'email' => $email,
            'website' => $website,
            'phone' => $phone
        ]);
        return redirect()->route('proveedores');
    }
    public function deleteProvider($id)
    {
        $provider = Provider::findOrFail($id);
        if (Product::where('provider_id', $id)->exists()) {
            return redirect()->route('proveedores')->with('mensaje', 'Proveedor NO eliminado ya que existe un producto con este proveedor.');
        } else {
            $provider->delete();
            return redirect()->route('proveedores')->with('mensaje', 'Proveedor eliminado correctamente');
        }
    }
    function indexCategories()
    {

        $categories = Category::get();
        return view('configuracion.categorias', ['categories' => $categories]);
    }

    function storeCategory(Request $request)
    {

        $name =  $request->name;
        $description = $request->description;
        echo $description;
        $category = Category::firstOrCreate([
            'name' => $name,
            'description' => $description
        ]);
        return redirect()->route('categorias');
    }
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if (Product::where('color_id', $id)->exists()) {
            return redirect()->route('categorias')->with('mensaje', 'Categoria NO elminado ya que existe un producto con esta categoria.');
        } else {
            $category->delete();
            return redirect()->route('categorias')->with('mensaje', 'Categoria eliminada correctamente');
        }
    }
    function indexSizes()
    {

        $sizes = Size::get();
        return view('configuracion.tallas', ['sizes' => $sizes]);
    }

    function storeSize(Request $request)
    {

        $name =  $request->name;
        $size = Size::firstOrCreate(['name' => $name]);
        return redirect()->route('tallas');
    }
    public function deleteSize($id)
    {
        if (Product::where('color_id', $id)->exists()) {
            return redirect()->route('tallas')->with('mensaje', 'Talla NO elminada ya que existe un producto con esta talla.');
        } else {
            $size = Size::findOrFail($id);
            $size->delete();
            return redirect()->route('tallas')->with('mensaje', 'Talla eliminada correctamente');
        }
    }
}
