<?php

namespace App\Http\Livewire;

use App\Models\Solicitudes;
use App\Services\Firma\FirmaProcess;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class FirmarTodo extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'confirmed',
        'cancelled',
    ];

    public $solicitud, $archivo, $pass, $cadena, $conteoInicial;

    public function mount()
    {
        $this->conteoInicial = Solicitudes::firmar()->count();
    }

    public function render()
    {
        return view('livewire.firmar-todo');
    }

    public function firmar()
    {
        // $this->validarReglas();

        $todas = Solicitudes::firmar()->get();

        foreach ($todas as $solicitud) {

            $this->cadena = $solicitud->id;

            $firmar = new FirmaProcess($this->pass, $this->archivo, $this->cadena);
            $firmar->firmar();

            $solicitud->update([
                'firma' => $firmar->firma()
            ]);
        }

        if (Solicitudes::firmar()->count() == 0) {
            Session::flash('message', 'Se firmaron todas correctamente');

            Session::flash('alert-class', 'alert-success');
            return redirect()->route('solicitudes');
        } else {
            $this->warning('Vuelva a intentar por favor');
        }
    }

    private function validarReglas()
    {
        $this->validate([
            'pass' => 'required',
            'archivo' => 'file|max:1024'
        ]);
    }
}
