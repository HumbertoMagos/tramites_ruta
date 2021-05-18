<?php

namespace App\Http\Livewire;

use App\Services\Firma\FirmaProcess;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class FirmarUno extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'confirmed',
        'cancelled',
    ];

    public $solicitud, $archivo, $pass, $cadena;

    public function mount()
    {
        $this->cadena = $this->solicitud->unidad->placa;
    }

    public function render()
    {
        return view('livewire.firmar-uno');
    }

    public function firmar()
    {
        $this->validarReglas();

        $this->cadena = $this->solicitud->getCadena();
        $firmar = new FirmaProcess($this->pass, $this->archivo, $this->cadena);
        $firmar->firmar();
        // $data['cadena'] = $solicitante_model->curp_rfc.'|'.$concesion_model->id.'|'.$data['cadena'].'|SUSTITUCIÓN';

        if (!$firmar->error) {
            $update = $this->solicitud->update([
                'firma' => $firmar->firma()
            ]);

            if ($update) {
                Session::flash('message', 'Se firmo correctamente');

                Session::flash('alert-class', 'alert-success');
                return redirect()->route('solicitudes');
            }
        }

        $this->warning('Vuelva a intentar por favor');
    }

    private function validarReglas()
    {
        $this->validate([
            'cadena' => 'required',
            'pass' => 'required',
            'archivo' => 'file|max:1024'
        ]);
    }
}
