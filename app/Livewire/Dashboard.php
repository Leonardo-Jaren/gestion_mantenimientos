<?php

namespace App\Livewire;

use App\Models\Equipo;
use App\Models\Tecnico;
use App\Models\Incidencia;
use App\Models\Mantenimiento;
use App\Models\TipoEquipo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $stats = [];
    public $equiposPorTipo = [];
    public $incidenciasPorPrioridad = [];
    public $mantenimientosPorEstado = [];
    public $proximosMantenimientos = [];
    public $incidenciasRecientes = [];

    public function mount()
    {
        $this->loadStats();
        $this->loadChartData();
        $this->loadRecentData();
    }

    public function loadStats()
    {
        // Estadísticas de equipos
        $totalEquipos = Equipo::count();
        $equiposOperativos = Equipo::where('estado', 'Operativo')->count();
        $equiposMantenimiento = Equipo::where('estado', 'En Mantenimiento')->count();
        $equiposFueraServicio = Equipo::where('estado', 'Fuera de Servicio')->count();

        // Estadísticas de mantenimientos
        $mantenimientosPendientes = Mantenimiento::where('estado', 'Pendiente')->count();
        $mantenimientosHoy = Mantenimiento::whereDate('fecha_programada', Carbon::today())->count();
        $mantenimientosCompletados = Mantenimiento::where('estado', 'Completado')->count();

        // Estadísticas de incidencias
        $incidenciasAbiertas = Incidencia::where('estado', 'Abierta')->count();
        $incidenciasEnRevision = Incidencia::where('estado', 'En revisión')->count();
        $incidenciasResueltas = Incidencia::where('estado', 'Resuelta')->count();

        // Técnicos activos
        $tecnicosActivos = Tecnico::count();

        $this->stats = [
            'equipos_total' => $totalEquipos,
            'equipos_operativos' => $equiposOperativos,
            'equipos_mantenimiento' => $equiposMantenimiento,
            'equipos_fuera_servicio' => $equiposFueraServicio,
            'mantenimientos_pendientes' => $mantenimientosPendientes,
            'mantenimientos_hoy' => $mantenimientosHoy,
            'mantenimientos_completados' => $mantenimientosCompletados,
            'incidencias_abiertas' => $incidenciasAbiertas,
            'incidencias_revision' => $incidenciasEnRevision,
            'incidencias_resueltas' => $incidenciasResueltas,
            'tecnicos_activos' => $tecnicosActivos,
        ];
    }

    public function loadChartData()
    {
        // Equipos por tipo
        $this->equiposPorTipo = TipoEquipo::withCount('equipos')
            ->get()
            ->map(function ($tipo) {
                return [
                    'nombre' => $tipo->nombre,
                    'cantidad' => $tipo->equipos_count
                ];
            })->toArray();

        // Incidencias por prioridad
        $this->incidenciasPorPrioridad = Incidencia::select('prioridad', DB::raw('count(*) as total'))
            ->groupBy('prioridad')
            ->get()
            ->map(function ($item) {
                return [
                    'prioridad' => $item->prioridad,
                    'total' => $item->total
                ];
            })->toArray();

        // Mantenimientos por estado
        $this->mantenimientosPorEstado = Mantenimiento::select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get()
            ->map(function ($item) {
                return [
                    'estado' => $item->estado,
                    'total' => $item->total
                ];
            })->toArray();
    }

    public function loadRecentData()
    {
        // Próximos mantenimientos (próximos 7 días)
        $this->proximosMantenimientos = Mantenimiento::with(['equipo', 'tecnico'])
            ->where('estado', 'Pendiente')
            ->whereBetween('fecha_programada', [Carbon::today(), Carbon::today()->addDays(7)])
            ->orderBy('fecha_programada', 'asc')
            ->limit(5)
            ->get()
            ->map(function ($mantenimiento) {
                return [
                    'equipo' => $mantenimiento->equipo->nombre,
                    'tecnico' => $mantenimiento->tecnico->nombre,
                    'tipo' => $mantenimiento->tipo,
                    'fecha' => Carbon::parse($mantenimiento->fecha_programada)->format('d/m/Y'),
                    'dias_restantes' => Carbon::today()->diffInDays(Carbon::parse($mantenimiento->fecha_programada))
                ];
            })->toArray();

        // Incidencias recientes
        $this->incidenciasRecientes = Incidencia::with(['equipo', 'tecnico'])
            ->whereIn('estado', ['Abierta', 'En revisión'])
            ->orderBy('fecha_reporte', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($incidencia) {
                return [
                    'equipo' => $incidencia->equipo->nombre,
                    'tecnico' => $incidencia->tecnico->nombre,
                    'descripcion' => substr($incidencia->descripcion, 0, 50) . '...',
                    'prioridad' => $incidencia->prioridad,
                    'estado' => $incidencia->estado,
                    'fecha' => Carbon::parse($incidencia->fecha_reporte)->format('d/m/Y')
                ];
            })->toArray();
    }

    public function refresh()
    {
        $this->loadStats();
        $this->loadChartData();
        $this->loadRecentData();
        
        $this->dispatch('notify', 
            type: 'success',
            message: 'Dashboard actualizado correctamente'
        );
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