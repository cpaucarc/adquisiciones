<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('home');
    //return redirect()->route('login');
})->name('inicio');

Route::get('login', LoginController::class)->name('login');

/* Contratos */
Route::get('contratos', [ContractController::class, 'index'])->name('contratos');
Route::get('contratos/crear', [ContractController::class, 'create'])->name('contratos.crear');
Route::get('contratos/{id}', [ContractController::class, 'show'])->name('contratos.mostrar');



//Route::post('/contratos/nuevo', function () {
//    return request();
//})->name('contratos.nuevo');
