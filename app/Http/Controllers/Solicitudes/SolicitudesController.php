<?php

namespace App\Http\Controllers\Solicitudes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes;
use Laravel\Ui\Presets\React;
Use Alert;


class SolicitudesController extends Controller
{

    public function TablaSolicitudes(){

        $solicitudes = Solicitudes::all();
        return view('solicitudes.datos_tabla', compact('solicitudes'));

    }

    public function ResumenSolicitud($id){
        $solicitud = Solicitudes::find($id);
        return view('solicitudes.resumen_solicitud', compact('solicitud'));
    }

    public function FinalizaSolicitud(){
        Alert::success('ENVIADO', 'Tu revision ah sido enviada con exito');
        return view('home');

    }

    public function update(){
        Alert::success('LISTO', 'todas las solicitudes han sido firmadas');
        return view('home');

    }

    public function delete($id){
        $elimina = Solicitudes::find($id);
        $elimina->delete();

        Alert::success('ELIMINADA', 'la solicitud ah sido eliminada');
        return view('home');
    }
}
