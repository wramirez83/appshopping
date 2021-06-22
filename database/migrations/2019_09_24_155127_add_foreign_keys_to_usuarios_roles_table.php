<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuariosRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuarios_roles', function(Blueprint $table)
		{
			$table->foreign('id_rol', 'fk_usuarios_roles_roles1')->references('id_rol')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_usuario', 'fk_usuarios_usuarios_roles1')->references('id_usuario')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuarios_roles', function(Blueprint $table)
		{
			$table->dropForeign('fk_usuarios_roles_roles1');
			$table->dropForeign('fk_usuarios_usuarios_roles1');
		});
	}

}
