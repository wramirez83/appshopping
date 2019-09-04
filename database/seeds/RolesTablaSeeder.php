<?php

use Illuminate\Database\Seeder;
use App\usuarios_roles;

class RolesTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      usuarios_roles::create([
        'id_usuario_rol' => 1,
        'id_usuario' =>  1,
        'id_rol' => 1
      ]);
      usuarios_roles::create([
        'id_usuario_rol' => 2,
        'id_usuario' =>  1,
        'id_rol' => 4
      ]);

      // usuarios_roles::create([
      //   'id_usuario_rol' => 3,
      //   'id_usuario' =>  2,
      //   'id_rol' => 4
      // ]);
      // usuarios_roles::create([
      //   'id_usuario_rol' => 4,
      //   'id_usuario' =>  2,
      //   'id_rol' => 6
      // ]);
      // usuarios_roles::create([
      //   'id_usuario_rol' => 2,
      //   'id_usuario' =>  2,
      //   'id_rol' => 2
      // ]);
    }
}
