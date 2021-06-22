<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistorialestadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historialestados', function(Blueprint $table)
		{
			$table->integer('idHistorialEstados', true);
			$table->integer('idEstadoAnterior')->index('fk_historialEstados_estados1_idx');
			$table->integer('idEstadoNuevo')->index('fk_historialEstados_estados2_idx');
			$table->integer('idUsuario')->index('fk_historialEstados_usuarios1_idx');
			$table->integer('idSolicitud')->index('fk_historialEstados_solicitudes1_idx');
			$table->string('observacion', 1500)->nullable();
			$table->timestamp('fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamps();
			$table->primary(['idHistorialEstados','idSolicitud','idEstadoAnterior','idEstadoNuevo','idUsuario']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('historialestados');
	}

}
