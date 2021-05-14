<?php

namespace App\Http\Controllers\Solicitudes\subdireccion;

use App\Models\Solicitudes;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreValidarUna;
use RealRashid\SweetAlert\Facades\Alert;

class SolicitudesSubController extends Controller
{
    public function TablasSolicitudesSub(){

        $solicitudes = Solicitudes::all();
        return view('solicitudes.subdireccion.datos_tabla', compact('solicitudes'));

    }

    public function ResumenSolicitudSub($id){
        $solicitud = Solicitudes::find($id);
        return view('solicitudes.subdireccion.resumen_solicitud', compact('solicitud'));
    }

    public function FinalizaSolicitudSub(){
        Alert::success('ENVIADO', 'Tu revision ah sido enviada con exito');
        return redirect('home');
    }

    public function FirmaTodasSub(StoreValidar $request){
        Alert::success('LISTO', 'todas las solicitudes han sido firmadas');
        return redirect('home');
    }

    public function FirmaUnaSub(StoreValidarUna $request){
        Alert::success('LISTO', 'todas las solicitudes han sido firmadas');
        return redirect('home');
    }

    public function eliminaSolicitudSub($id){
        $elimina = Solicitudes::find($id);
        $elimina->delete();

        Alert::success('ELIMINADA', 'la solicitud ah sido eliminada');
        return redirect('home');
    }
}
