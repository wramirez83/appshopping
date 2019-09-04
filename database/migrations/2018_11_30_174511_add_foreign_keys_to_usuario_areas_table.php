<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuarioAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuario_areas', function(Blueprint $table)
		{
			$table->foreign('id_usuario', 'fk_usuario_areas_usuarios1')->references('id_usuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_area', 'fk_usuarios_areas_areas_formacion1')->references('id_area')->on('areas_formacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuario_areas', function(Blueprint $table)
		{
			$table->dropForeign('fk_usuario_areas_usuarios1');
			$table->dropForeign('fk_usuarios_areas_areas_formacion1');
		});
	}

}
