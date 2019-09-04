<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios_roles', function(Blueprint $table)
		{
			$table->integer('id_usuario_rol', true);
			$table->integer('id_usuario')->nullable()->index('fk_usuarios_usuarios_roles1');
			$table->integer('id_rol')->nullable()->index('fk_usuarios_roles_roles1');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios_roles');
	}

}
