<?php

namespace App\Http\Controllers\Solicitudes\direccion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes;
use RealRashid\SweetAlert\Facades\Alert;


class SolicitudesDireccionController extends Controller
{
    public function TablasSolicitudesDireccion(){

        $solicitudes = Solicitudes::all();
        return view('solicitudes.direccion.datos_tabla', compact('solicitudes'));

    }

    public function ResumenSolicitudDireccion($id){
        $solicitud = Solicitudes::find($id);
        dd($solicitud);
        return view('solicitudes.direccion.resumen_solicitud', compact('solicitud'));
    }

    public function FinalizaSolicitudDireccion(){
        Alert::success('ENVIADO', 'Tu revision ah sido enviada con exito');
        return redirect('home');
    }

    public function FirmaTodasDireccion(){
        Alert::success('LISTO', 'todas las solicitudes han sido firmadas');
        return redirect('home');

    }

    public function eliminaSolicitudDireccion($id){
        $elimina = Solicitudes::find($id);
        $elimina->delete();

        Alert::success('ELIMINADA', 'la solicitud ah sido eliminada');
        return redirect('home');
    }
}
