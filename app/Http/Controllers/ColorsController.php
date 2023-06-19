<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
function index () {

    $colors = Color::get();
    return view('colors', ['colors' => $colors]);
}
}
