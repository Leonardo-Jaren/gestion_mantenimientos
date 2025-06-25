<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoEquipos = [
            [
                'nombre' => 'Switch',
                'descripcion' => 'Dispositivo de red que conecta múltiples dispositivos en una red local (LAN)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Router',
                'descripcion' => 'Dispositivo que direcciona el tráfico de datos entre diferentes redes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Access Point',
                'descripcion' => 'Punto de acceso WiFi que permite conexiones inalámbricas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Firewall',
                'descripcion' => 'Sistema de seguridad que controla el tráfico de red entrante y saliente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Servidor',
                'descripcion' => 'Equipo que proporciona servicios y recursos a otros dispositivos de red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'UPS',
                'descripcion' => 'Sistema de alimentación ininterrumpida para equipos críticos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Patch Panel',
                'descripcion' => 'Panel de conexiones para organizar y gestionar cables de red',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('tipo_equipos')->insert($tipoEquipos);
    }
}