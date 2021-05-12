<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Solicitudes\SolicitudesController;
use App\Http\Controllers\Solicitudes\jud\SolicitudesJudController;
use App\Http\Controllers\Solicitudes\subdireccion\SolicitudesSubController;
use App\Http\Controllers\Solicitudes\direccion\SolicitudesDireccionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('direccion')->group(function(){

    Route::get('/solicitudes_pendientes', [SolicitudesDireccionController::class, 'TablasSolicitudesDireccion'])->name('direccion:datos');
    Route::get('/resumen_solicitud/{id}', [SolicitudesDireccionController::class, 'ResumenSolicitudDireccion'])->name('direccion:resumen');
    Route::get('/elimina_solicitud/{id}', [SolicitudesDireccionController::class, 'eliminaSolicitudDireccion'])->name('direccion:elimina');
    Route::post('/califica_solicitud', [SolicitudesDireccionController::class, 'FirmaTodasDireccion'])->name('direccion:califica');
    Route::get('/finaliza_revision', [SolicitudesDireccionController::class, 'FinalizaSolicitudDireccion'])->name('direccion:finaliza');

});


Route::prefix('subdireccion')->group(function(){

    Route::get('/solicitudes_pendientes', [SolicitudesSubController::class, 'TablasSolicitudesSub'])->name('sub:datos');
    Route::get('/resumen_solicitud/{id}', [SolicitudesSubController::class, 'ResumenSolicitudSub'])->name('sub:resumen');
    Route::get('/elimina_solicitud/{id}', [SolicitudesSubController::class, 'eliminaSolicitudSub'])->name('sub:elimina');
    Route::post('/califica_solicitud', [SolicitudesSubController::class, 'FirmaTodasSub'])->name('sub:califica');
    Route::get('/finaliza_revision', [SolicitudesSubController::class, 'FinalizaSolicitud'])->name('sub:finaliza');

});


Route::prefix('jud')->group(function(){

    Route::get('/solicitudes_pendientes', [SolicitudesJudController::class, 'TablasSolicitudesJud'])->name('jud:datos');
    Route::get('/resumen_solicitud/{id}', [SolicitudesJudController::class, 'ResumenSolicitudJud'])->name('jud:resumen');
    Route::get('/elimina_solicitud/{id}', [SolicitudesJudController::class, 'eliminaSolicitudJud'])->name('jud:elimina');
    Route::post('/califica_solicitud', [SolicitudesJudController::class, 'FirmaTodasJud'])->name('jud:califica');
    Route::get('/finaliza_revision', [SolicitudesJudController::class, 'FinalizaSolicitudJud'])->name('jud:finaliza');

});

