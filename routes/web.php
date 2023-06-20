<?php

use App\Http\Controllers\AlmacenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\VentasController;

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



Route::view('/', 'welcome')->name('welcome');

//--ROUTES PRINCIPALES INDEXs--
Route::get('/clientes', [ClientesController::class , 'index'])->name('clientes');  //esto es lo mismo que Route::get('/cliente','ClientesController@index') Pero esto me da fallo no se porque.
Route::get('/ventas', [VentasController::class,'index'])->name('ventas');


/**RUTAS DE CONFIGURACION */
Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');

Route::delete('/proveedores/{id}', [ConfiguracionController::class, 'deleteProvider'])->name('deleteProvider');
Route::get('/proveedores', [ConfiguracionController::class, 'indexProviders'])->name('proveedores');
Route::post('/proveedores', [ConfiguracionController::class, 'storeProvider'])->name('storeProvider');

Route::delete('/categorias/{id}', [ConfiguracionController::class, 'deleteCategory'])->name('deleteCategory');
Route::get('/categorias', [ConfiguracionController::class, 'indexCategories'])->name('categorias');
Route::post('/categorias', [ConfiguracionController::class, 'storeCategory'])->name('storeCategory');

Route::delete('/colores/{id}', [ConfiguracionController::class, 'deleteColor'])->name('deleteColor');
Route::get('/colores', [ConfiguracionController::class, 'indexColors'])->name('colores');
Route::post('/colores', [ConfiguracionController::class, 'storeColor'])->name('storeColor');

Route::delete('/tallas/{id}', [ConfiguracionController::class, 'deleteSize'])->name('deleteSize');
Route::get('/tallas', [ConfiguracionController::class, 'indexSizes'])->name('tallas');
Route::post('/tallas', [ConfiguracionController::class, 'storeSize'])->name('storeSize');





/** RUTAS DE ALMACEN */
Route::get('/almacen', [AlmacenController::class,'index'])->name('almacen');    //por convencion metodo index, para listar productos

Route::get('/producto/crear', [AlmacenController::class,'create'])->name('nuevoproducto');  //ruta para añadir un nuevo producto

//Ruta para mostrar en detalle un producto, envía parámetro de routa el id del producto.
Route::get('/producto/{id}', [AlmacenController::class,'show'])->name('producto');   //por convencion show, para mostrar un producto
Route::patch('/producto/{id}', [AlmacenController::class,'update'])->name('updateproducto');
Route::get('/producto/{id}/edit', [AlmacenController::class,'edit'])->name('productoEditar');   //por convencion show, para mostrar un producto

Route::post('/producto',[AlmacenController::class,'store'])->name('guardarproducto');   //por convencion store.
