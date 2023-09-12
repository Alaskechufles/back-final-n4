<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Persona::create(
            [
                'primer_nombre' => 'admin',
                'segundo_nombre' => 'snadmin',
                'primer_apellido' => 'apeadmin',
                'segundo_nombre' => 'seapeadmin',
                'usuariocreacion' => now(),
                'usuariomodificacion' => NULL,
            ],
            [
                'primer_nombre' => 'admin2',
                'segundo_nombre' => 'snadmin2',
                'primer_apellido' => 'apeadmin2',
                'segundo_nombre' => 'seapeadmin2',
                'usuariocreacion' => now(),
                'usuariomodificacion' => NULL,
            ],
            [
                'primer_nombre' => 'admin3',
                'segundo_nombre' => 'snadmin3',
                'primer_apellido' => 'apeadmin3',
                'segundo_nombre' => 'seapeadmin3',
                'usuariocreacion' => now(),
                'usuariomodificacion' => NULL,
            ]

        );
    }
}
