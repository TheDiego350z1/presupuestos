<?php

namespace App\Http\Livewire\Etiquetas;

use Livewire\Component;

use App\Models\Etiquetas;

class Crear extends Component
{
    public $open = false;

    public $nombre, $tipo;

    protected $rules = [
        'nombre' => 'required',
        'tipo' => 'required',
    ];

    public function render()
    {
        return view('livewire.etiquetas.crear');
    }

    public function crear()
    {
        $this->validate();

        $user = auth()->user();

       $etiqueta = Etiquetas::create([
           'nombre' => $this->nombre,
           'tipo' => $this->tipo,
           'user_id' => $user->id
       ]);

       $this->emit('exito', 'Etiqueta creada con exito');

       $this->reset([
           'nombre',
           'tipo',
           'open'
       ]);
    }

}
