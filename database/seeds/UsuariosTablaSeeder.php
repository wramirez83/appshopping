<?php

use Illuminate\Database\Seeder;
use App\User;


class UsuariosTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'id_usuario' => 1,
          'id_tipo_documento' => 2,
          'correo' => 'wramirez@sena.edu.co',
          'nombre_usuario' => 'Wilson Ramirez Z',
          'clave' => bcrypt('wramirez'),
          'documento' => '18520991'
        ]);
        User::create([
          'id_usuario' => 2,
          'id_tipo_documento' => 2,
          'correo' => 'wramirez@misena.edu.co',
          'nombre_usuario' => 'Usuarios de Prueba',
          'clave' => bcrypt('123'),
          'documento' => '123'
        ]);

    }
}
