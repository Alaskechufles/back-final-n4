<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create(
            [
                'persona_id' => 1,
                'rol_id' => 1,
                'usuario' => 'admin@admin',
                'clave' => 'admin',
                'habilitado' => 1,
                'fecha' => now(),
                'usuariocreacion' => now(),
                'usuariomodificacion' => NULL,
            ],
            [
                'persona_id' => 2,
                'rol_id' => 1,
                'usuario' => 'admin2@admin',
                'clave' => 'admin2',
                'habilitado' => 1,
                'fecha' => now(),
                'usuariocreacion' => now(),
                'usuariomodificacion' => NULL,
            ],
            [
                'persona_id' => 3,
                'rol_id' => 1,
                'usuario' => 'admin3@admin',
                'clave' => 'admin3',
                'habilitado' => 1,
                'fecha' => now(),
                'usuariocreacion' => now(),
                'usuariomodificacion' => NULL,
            ],

        );
    }
}
