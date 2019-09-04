<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudes', function(Blueprint $table)
		{
			$table->integer('id_solicitud', true);
			$table->integer('id_estado')->index('fk_solicitudes_estados1');
			$table->integer('id_usuario')->nullable()->index('fk_solicitudes_usuarios1');
			$table->integer('id_ficha')->nullable()->default(1)->index('fk_solicitudes_ficha1');
			$table->integer('id_area_formacion')->index('fk_solicitudes_areas_formacion1');
			$table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('solicitudes');
	}

}
