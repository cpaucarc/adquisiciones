<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Storage;

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

/* [Home] Perfiles segun oficina */
//Route::get('/', function () {
//    return view('profiles.und-alm-cnt');
//    //return redirect()->route('login');
//})->name('inicio')->middleware(['checklogged']);
Route::get('/', [ProfileController::class, 'index'])->name('inicio');

Route::get('test', function () {
    return view('testview');
})->name('test');

/* Login */
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('log-in');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/* Contratos */
Route::get('contratos', [ContractController::class, 'index'])->name('contratos');
Route::get('contratos/crear', [ContractController::class, 'create'])->name('contratos.crear');
Route::get('contratos/{id}', [ContractController::class, 'show'])->name('contratos.mostrar');

/* Files */
Route::get('storage/{file}', function ($file) {
    return Storage::response($file);
})->name('file');
