<?php

namespace App\Http\Controllers\Solicitudes\direccion;

use App\Models\Solicitudes;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreValidarUna;
use RealRashid\SweetAlert\Facades\Alert;


class SolicitudesDireccionController extends Controller
{
    public function TablasSolicitudesDireccion()
    {

        $solicitudes = Solicitudes::firmar()->get();
        return view('solicitudes.direccion.datos_tabla', compact('solicitudes'));
    }

    public function ResumenSolicitudDireccion($id)
    {
        $solicitud = Solicitudes::find($id);
        return view('solicitudes.direccion.resumen_solicitud', compact('solicitud'));
    }

    public function FinalizaSolicitudDireccion()
    {
        Alert::success('ENVIADO', 'Tu revision ah sido enviada con exito');
        return redirect('home');
    }

    public function eliminaSolicitudDireccion($id)
    {
        $elimina = Solicitudes::find($id);
        $elimina->delete();

        Alert::success('ELIMINADA', 'la solicitud ah sido eliminada');
        return redirect('home');
    }
}
