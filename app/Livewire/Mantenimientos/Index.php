<?php

namespace App\Livewire\Mantenimientos;

use Livewire\Component;
use App\Models\Mantenimiento;

class Index extends Component
{
    public function render()
    {
        $mantenimientos = Mantenimiento::with(['equipo', 'tecnico'])->get();
        return view('livewire.mantenimientos.index', compact('mantenimientos'));
    }
}
