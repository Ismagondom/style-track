<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
function index () {

    $clients = Client::get();
    return view('clientes', ['clients' => $clients]);
}
}
