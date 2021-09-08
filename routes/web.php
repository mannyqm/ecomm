<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::apiResource('/productos', App\Http\Controllers\ProductoController::class);
Route::apiResource('/camisetas', App\Http\Controllers\CamisetaController::class);
Route::apiResource('/colores', App\Http\Controllers\ColorController::class);
Route::apiResource('/sexos', App\Http\Controllers\SexoController::class);
Route::apiResource('/tallas', App\Http\Controllers\TallaController::class);

