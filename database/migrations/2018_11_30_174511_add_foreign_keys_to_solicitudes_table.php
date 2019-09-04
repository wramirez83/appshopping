<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSolicitudesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('solicitudes', function(Blueprint $table)
		{
			$table->foreign('id_area_formacion', 'fk_solicitudes_areas_formacion1')->references('id_area')->on('areas_formacion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_estado', 'fk_solicitudes_estados1')->references('id_estado')->on('estados')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_ficha', 'fk_solicitudes_ficha1')->references('id_ficha')->on('fichas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_usuario', 'fk_solicitudes_usuarios1')->references('id_usuario')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('solicitudes', function(Blueprint $table)
		{
			$table->dropForeign('fk_solicitudes_areas_formacion1');
			$table->dropForeign('fk_solicitudes_estados1');
			$table->dropForeign('fk_solicitudes_ficha1');
			$table->dropForeign('fk_solicitudes_usuarios1');
		});
	}

}
