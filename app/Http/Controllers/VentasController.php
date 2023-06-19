<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    function index () {

        $sales = Sale::get();
        return view('ventas', ['sales' => $sales]);
    }
}
