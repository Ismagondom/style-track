<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    function index () {

        $products = Product::get();
        return view('almacen', ['products' => $products]);
    }
    function show($id){
        $product = Product::findOrFail($id);    //findOrFail hace que si no lo encuentra nos da el error 404 File not Found
        return view('producto',['product' => $product]);
    }
}
