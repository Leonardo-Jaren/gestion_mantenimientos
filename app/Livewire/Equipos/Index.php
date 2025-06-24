<?php

namespace App\Livewire\Equipos;

use Livewire\Component;
use App\Models\Equipo;

class Index extends Component
{
    public function render()
    {
        $equipos = Equipo::with('tipoEquipo')->get();
        return view('livewire.equipos.index', compact('equipos'));
    }
}
