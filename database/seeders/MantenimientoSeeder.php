<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MantenimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mantenimientos = [
            // Mantenimientos Preventivos
            [
                'equipo_id' => 1, // SW-CORE-01
                'tecnico_id' => 1, // Carlos Mendoza
                'tipo' => 'Preventivo',
                'fecha_programada' => '2024-07-15',
                'resultado' => 'Mantenimiento completado exitosamente. Firmware actualizado y puertos limpiados.',
                'observaciones' => 'Se recomienda programar el próximo mantenimiento en 3 meses.',
                'estado' => 'Completado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 4, // RTR-PRINCIPAL
                'tecnico_id' => 1, // Carlos Mendoza
                'tipo' => 'Preventivo',
                'fecha_programada' => '2024-08-01',
                'resultado' => null,
                'observaciones' => 'Mantenimiento programado para actualización de firmware y revisión de configuración.',
                'estado' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 12, // UPS-PRINCIPAL
                'tecnico_id' => 5, // Roberto Chávez
                'tipo' => 'Preventivo',
                'fecha_programada' => '2024-07-30',
                'resultado' => 'Baterías revisadas y calibradas. Sistema funcionando correctamente.',
                'observaciones' => 'Reemplazar baterías en 6 meses aproximadamente.',
                'estado' => 'Completado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 10, // SRV-WEB-01
                'tecnico_id' => 2, // Ana García
                'tipo' => 'Preventivo',
                'fecha_programada' => '2024-08-10',
                'resultado' => null,
                'observaciones' => 'Mantenimiento programado para limpieza interna y actualización de SO.',
                'estado' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Mantenimientos Correctivos
            [
                'equipo_id' => 3, // SW-PISO3-01
                'tecnico_id' => 4, // Laura Fernández
                'tipo' => 'Correctivo',
                'fecha_programada' => '2024-06-25',
                'resultado' => 'Puerto 12 reparado. Problema era conexión suelta en el conector RJ45.',
                'observaciones' => 'Se reemplazó el conector y se probó la conectividad.',
                'estado' => 'Completado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 8, // AP-OFICINAS-P2
                'tecnico_id' => 6, // Patricia Herrera
                'tipo' => 'Correctivo',
                'fecha_programada' => '2024-06-24',
                'resultado' => null,
                'observaciones' => 'Access Point requiere reemplazo completo. Falla en la fuente de alimentación.',
                'estado' => 'En progreso',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Mantenimientos Predictivos
            [
                'equipo_id' => 11, // SRV-DB-01
                'tecnico_id' => 2, // Ana García
                'tipo' => 'Predictivo',
                'fecha_programada' => '2024-07-20',
                'resultado' => 'Análisis de logs completado. Discos duros en buen estado, CPU funcionando óptimamente.',
                'observaciones' => 'Monitoreo indica operación normal. Próxima revisión en 2 meses.',
                'estado' => 'Completado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 9, // FW-PERIMETRAL
                'tecnico_id' => 3, // Miguel Ruiz
                'tipo' => 'Predictivo',
                'fecha_programada' => '2024-08-05',
                'resultado' => null,
                'observaciones' => 'Análisis programado de logs de seguridad y rendimiento del firewall.',
                'estado' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 6, // AP-RECEPCION
                'tecnico_id' => 4, // Laura Fernández
                'tipo' => 'Preventivo',
                'fecha_programada' => '2024-08-15',
                'resultado' => null,
                'observaciones' => 'Limpieza programada y optimización de canales WiFi.',
                'estado' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_id' => 7, // AP-SALA-JUNTAS
                'tecnico_id' => 6, // Patricia Herrera
                'tipo' => 'Preventivo',
                'fecha_programada' => '2024-07-25',
                'resultado' => 'Access Point limpiado y configuración optimizada para mejor cobertura.',
                'observaciones' => 'Funcionamiento normal. Próxima revisión en 4 meses.',
                'estado' => 'Completado',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('mantenimientos')->insert($mantenimientos);
    }
}