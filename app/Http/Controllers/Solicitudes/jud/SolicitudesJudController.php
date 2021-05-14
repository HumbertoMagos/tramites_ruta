<?php

namespace App\Http\Controllers\Solicitudes\jud;

use App\Models\Solicitudes;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreValidarUna;
use RealRashid\SweetAlert\Facades\Alert;


class SolicitudesJudController extends Controller
{
    public function TablasSolicitudesJud(){

        $solicitudes = Solicitudes::all();
        return view('solicitudes.jud.datos_tabla', compact('solicitudes'));

    }

    public function ResumenSolicitudJud($id){
        $solicitud = Solicitudes::find($id);
        return view('solicitudes.jud.resumen_solicitud', compact('solicitud'));
    }

    public function FinalizaSolicitudJud(){
        Alert::success('ENVIADO', 'Tu revision ah sido enviada con exito');
        return redirect('home');
    }

    public function FirmaTodasJud(StoreValidar $request){
        Alert::success('LISTO', 'todas las solicitudes han sido firmadas');
        return redirect('home');

    }
    public function FirmaUnaJud(StoreValidarUna $request){
        Alert::success('LISTO', 'todas las solicitudes han sido firmadas');
        return redirect('home');

    }

    public function eliminaSolicitudJud($id){
        $elimina = Solicitudes::find($id);
        $elimina->delete();

        Alert::success('ELIMINADA', 'la solicitud ah sido eliminada');
        return redirect('home');
    }
}
