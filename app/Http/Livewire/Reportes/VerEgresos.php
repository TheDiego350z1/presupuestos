<?php

namespace App\Http\Livewire\Reportes;

use Livewire\Component;

use App\Models\Movimientos;

class VerEgresos extends Component
{
    public function render()
    {
        $movimientos = Movimientos::where('user_id', '=', auth()->user()->id)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        return view('livewire.reportes.ver-egresos', compact('movimientos'));
    }
}
