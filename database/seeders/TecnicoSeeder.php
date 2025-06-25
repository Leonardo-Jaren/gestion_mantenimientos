<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnicos = [
            [
                'nombre' => 'Carlos Mendoza López',
                'especialidad' => 'Redes y Comunicaciones',
                'telefono' => '+51 987 654 321',
                'correo' => 'carlos.mendoza@empresa.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ana García Torres',
                'especialidad' => 'Sistemas y Servidores',
                'telefono' => '+51 987 654 322',
                'correo' => 'ana.garcia@empresa.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Miguel Ruiz Vargas',
                'especialidad' => 'Seguridad Informática',
                'telefono' => '+51 987 654 323',
                'correo' => 'miguel.ruiz@empresa.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laura Fernández Silva',
                'especialidad' => 'Infraestructura de Red',
                'telefono' => '+51 987 654 324',
                'correo' => 'laura.fernandez@empresa.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Roberto Chávez Morales',
                'especialidad' => 'Mantenimiento Preventivo',
                'telefono' => '+51 987 654 325',
                'correo' => 'roberto.chavez@empresa.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Patricia Herrera Cruz',
                'especialidad' => 'Soporte Técnico General',
                'telefono' => '+51 987 654 326',
                'correo' => 'patricia.herrera@empresa.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('tecnicos')->insert($tecnicos);
    }
}