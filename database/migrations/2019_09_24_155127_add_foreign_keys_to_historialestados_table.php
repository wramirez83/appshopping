<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHistorialestadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('historialestados', function(Blueprint $table)
		{
			$table->foreign('idEstadoAnterior', 'fk_historialEstados_estados1')->references('id_estado')->on('estados')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idEstadoNuevo', 'fk_historialEstados_estados2')->references('id_estado')->on('estados')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idSolicitud', 'fk_historialEstados_solicitudes1')->references('id_solicitud')->on('solicitudes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idUsuario', 'fk_historialEstados_usuarios1')->references('id_usuario')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('historialestados', function(Blueprint $table)
		{
			$table->dropForeign('fk_historialEstados_estados1');
			$table->dropForeign('fk_historialEstados_estados2');
			$table->dropForeign('fk_historialEstados_solicitudes1');
			$table->dropForeign('fk_historialEstados_usuarios1');
		});
	}

}
