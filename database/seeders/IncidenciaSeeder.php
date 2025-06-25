<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $incidencias = [
            [
                'equipo_id' => 1, // SW-CORE-01
                'tecnico_id' => 1, // Carlos Mendoza
                'descripcion' => 'Intermitencias en la conectividad de red. Varios usuarios reportan desconexiones esporádicas cada 2-3 horas.',
                'prioridad' => 'Alta',
                'estado' => 'Resuelta',
                'fecha_reporte' => '2024-06-15',
                'fecha_solucion' => '2024-06-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 3, // SW-PISO3-01
                'tecnico_id' => 4, // Laura Fernández
                'descripcion' => 'Switch presenta falla en puerto 12. No hay conectividad en la oficina de contabilidad.',
                'prioridad' => 'Alta',
                'estado' => 'En revisión',
                'fecha_reporte' => '2024-06-20',
                'fecha_solucion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 8, // AP-OFICINAS-P2
                'tecnico_id' => 2, // Ana García
                'descripcion' => 'Access Point no responde. Usuarios del piso 2 sin conectividad WiFi.',
                'prioridad' => 'Media',
                'estado' => 'Abierta',
                'fecha_reporte' => '2024-06-22',
                'fecha_solucion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 10, // SRV-WEB-01
                'tecnico_id' => 2, // Ana García
                'descripcion' => 'Servidor web presenta alta latencia. Páginas web cargan lentamente.',
                'prioridad' => 'Media',
                'estado' => 'Resuelta',
                'fecha_reporte' => '2024-06-10',
                'fecha_solucion' => '2024-06-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 9, // FW-PERIMETRAL
                'tecnico_id' => 3, // Miguel Ruiz
                'descripcion' => 'Firewall bloqueando acceso a sitios web legítimos. Reglas de seguridad requieren revisión.',
                'prioridad' => 'Baja',
                'estado' => 'En revisión',
                'fecha_reporte' => '2024-06-18',
                'fecha_solucion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 6, // AP-RECEPCION
                'tecnico_id' => 6, // Patricia Herrera
                'descripcion' => 'Señal WiFi débil en área de recepción. Usuarios reportan conexión lenta.',
                'prioridad' => 'Baja',
                'estado' => 'Abierta',
                'fecha_reporte' => '2024-06-21',
                'fecha_solucion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 12, // UPS-PRINCIPAL
                'tecnico_id' => 5, // Roberto Chávez
                'descripcion' => 'UPS emite alarma sonora intermitente. Batería puede estar próxima a fallar.',
                'prioridad' => 'Alta',
                'estado' => 'Abierta',
                'fecha_reporte' => '2024-06-23',
                'fecha_solucion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 11, // SRV-DB-01
                'tecnico_id' => 2, // Ana García
                'descripcion' => 'Servidor de base de datos presenta alertas de espacio en disco. Requiere limpieza de logs.',
                'prioridad' => 'Media',
                'estado' => 'Resuelta',
                'fecha_reporte' => '2024-06-19',
                'fecha_solucion' => '2024-06-20',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('incidencias')->insert($incidencias);
    }
}