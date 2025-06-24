<?php

namespace App\Livewire\Reportes;

use Livewire\Component;
use App\Models\Incidencia;

class Index extends Component
{
    public function render()
    {
        $incidencias = Incidencia::with(['equipo', 'tecnico'])->get();
        return view('livewire.reportes.index', compact('incidencias'));
    }
}
