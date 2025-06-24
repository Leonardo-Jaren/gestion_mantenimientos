<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $stats = [];

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        // Simulando datos estadísticos - reemplaza con tus modelos reales
        $this->stats = [
            'equipos_total' => 150,
            'equipos_activos' => 142,
            'mantenimientos_pendientes' => 12,
            'mantenimientos_hoy' => 3,
            'tecnicos_activos' => User::where('rol', 'Técnico')->count(),
            'ordenes_abiertas' => 8,
        ];
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
