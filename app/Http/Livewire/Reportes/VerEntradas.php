<?php

namespace App\Http\Livewire\Reportes;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Movimientos;

class VerEntradas extends Component
{
    use WithPagination;

    public function render()
    {
        $movimientos = Movimientos::where('user_id', '=', auth()->user()->id)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        return view('livewire.reportes.ver-entradas', compact('movimientos'));
    }
}
