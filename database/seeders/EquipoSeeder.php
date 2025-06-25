<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipos = [
            // Switches
            [
                'nombre' => 'SW-CORE-01',
                'tipo_equipo_id' => 1, // Switch
                'marca' => 'Cisco',
                'modelo' => 'Catalyst 2960-X',
                'ubicacion' => 'Sala de Servidores - Rack A1',
                'fecha_instalacion' => '2023-01-15',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SW-PISO2-01',
                'tipo_equipo_id' => 1, // Switch
                'marca' => 'HP',
                'modelo' => 'ProCurve 2848',
                'ubicacion' => 'Piso 2 - Closet de Telecomunicaciones',
                'fecha_instalacion' => '2023-02-10',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SW-PISO3-01',
                'tipo_equipo_id' => 1, // Switch
                'marca' => 'D-Link',
                'modelo' => 'DGS-1210-24',
                'ubicacion' => 'Piso 3 - Oficina Administración',
                'fecha_instalacion' => '2023-03-05',
                'estado' => 'En Mantenimiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Routers
            [
                'nombre' => 'RTR-PRINCIPAL',
                'tipo_equipo_id' => 2, // Router
                'marca' => 'Cisco',
                'modelo' => 'ISR 4331',
                'ubicacion' => 'Sala de Servidores - Rack A1',
                'fecha_instalacion' => '2022-12-01',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'RTR-BACKUP',
                'tipo_equipo_id' => 2, // Router
                'marca' => 'Mikrotik',
                'modelo' => 'RouterBOARD 1100AHx4',
                'ubicacion' => 'Sala de Servidores - Rack A2',
                'fecha_instalacion' => '2023-01-20',
                'estado' => 'Standby',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Access Points
            [
                'nombre' => 'AP-RECEPCION',
                'tipo_equipo_id' => 3, // Access Point
                'marca' => 'Ubiquiti',
                'modelo' => 'UniFi AP AC Pro',
                'ubicacion' => 'Área de Recepción - Techo',
                'fecha_instalacion' => '2023-01-25',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AP-SALA-JUNTAS',
                'tipo_equipo_id' => 3, // Access Point
                'marca' => 'TP-Link',
                'modelo' => 'EAP245',
                'ubicacion' => 'Sala de Juntas - Techo',
                'fecha_instalacion' => '2023-02-15',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'AP-OFICINAS-P2',
                'tipo_equipo_id' => 3, // Access Point
                'marca' => 'Ubiquiti',
                'modelo' => 'UniFi AP AC Lite',
                'ubicacion' => 'Piso 2 - Área de Oficinas',
                'fecha_instalacion' => '2023-03-01',
                'estado' => 'Fuera de Servicio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Firewalls
            [
                'nombre' => 'FW-PERIMETRAL',
                'tipo_equipo_id' => 4, // Firewall
                'marca' => 'Fortinet',
                'modelo' => 'FortiGate 60F',
                'ubicacion' => 'Sala de Servidores - Rack A1',
                'fecha_instalacion' => '2022-11-15',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Servidores
            [
                'nombre' => 'SRV-WEB-01',
                'tipo_equipo_id' => 5, // Servidor
                'marca' => 'Dell',
                'modelo' => 'PowerEdge R630',
                'ubicacion' => 'Sala de Servidores - Rack B1',
                'fecha_instalacion' => '2022-10-01',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SRV-DB-01',
                'tipo_equipo_id' => 5, // Servidor
                'marca' => 'HP',
                'modelo' => 'ProLiant DL380 Gen10',
                'ubicacion' => 'Sala de Servidores - Rack B1',
                'fecha_instalacion' => '2022-10-15',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // UPS
            [
                'nombre' => 'UPS-PRINCIPAL',
                'tipo_equipo_id' => 6, // UPS
                'marca' => 'APC',
                'modelo' => 'Smart-UPS 3000VA',
                'ubicacion' => 'Sala de Servidores - Piso',
                'fecha_instalacion' => '2022-09-01',
                'estado' => 'Operativo',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('equipos')->insert($equipos);
    }
}