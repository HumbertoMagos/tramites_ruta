<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Solicitudes\SolicitudesController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/solicitudes_Pendientes', [SolicitudesController::class, 'TablaSolicitudes'])->name('datos');

Route::get('/resumen_solicitud/{id}', [SolicitudesController::class, 'ResumenSolicitud'])->name('resumen');

Route::get('/finaliza_revision', [SolicitudesController::class, 'FinalizaSolicitud'])->name('finaliza');
