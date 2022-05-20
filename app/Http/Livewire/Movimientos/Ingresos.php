<?php

namespace App\Http\Livewire\Movimientos;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Etiquetas;

use App\Models\Movimientos;

class Ingresos extends Component
{
    use WithFileUploads;

    public $open = false;

    public $nombre, $monto, $fecha, $tipo, $photo, $identificador;

    protected $rules = [
        'nombre' => 'required',
        'monto' => 'required',
        'fecha' => 'required',
        'photo' => 'image|max:2048'
    ];

    public function mount()
    {
        $this->identificador = rand();
    }

    public function render()
    {
        $user = auth()->user()->id;

        $etiquetas = Etiquetas::where('user_id', '=', $user)
                    ->get();
        return view('livewire.movimientos.ingresos', compact('etiquetas'));
    }

    public function guardar()
    {
        $file = null;

        $this->validate();

        if($this->photo)
        {
            $this->validate([
                'photo' => 'image|max:2048'
            ]);

            $file = $this->photo->store('public/photos');
        }

        $movimiento = Movimientos::create([
            'nombre' => $this->nombre,
            'monto' => $this->monto,
            'fecha' => $this->fecha,
            'imagen' => $file,
            'tipo' => 1,
            'user_id' => auth()->user()->id,
            'etiqueta_id' => $this->tipo
        ]);


        $this->reset([
            'nombre',
            'monto',
            'fecha',
            'photo',
            'monto',
            'tipo',
            'open'
        ]);

        $this->emit('exito', 'Datos guardados de forma satisfactoria');

        $this->identificador = rand();
    }
}
