<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ColorsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Routa get a home, podria ser solo view, ya que en principio no recibe nada
Route::get('/home', function () {
    return view('home');
})->name('home');       //ponemos nombre para poder referirnos a esta ruta de forma mas segura, y así tener mejor feedbackde posible error en la ruta. con route('home');

Route::get('/almacen', function () {
    return view('almacen');
})->name('almacen');

Route::view('/', 'welcome')->name('welcome');

Route::get('/clientes', [ClientesController::class , 'index'])->name('clientes');  //esto es lo mismo que Route::get('/cliente','ClientesController@index') Pero esto me da fallo no se porque.
Route::view('/ventas', 'ventas')->name('ventas');
Route::view('/configuracion', 'configuracion')->name('configuracion');

Route::get('/colors', [ColorsController::class, 'index'])->name('colors');
