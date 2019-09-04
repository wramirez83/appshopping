<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudesPedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudes_pedidos', function(Blueprint $table)
		{
			$table->integer('solicitudes_id_solicitud');
			$table->integer('pedidos_id_pedido')->index('fk_solicitudes_has_pedidos_pedidos1');
			$table->primary(['solicitudes_id_solicitud','pedidos_id_pedido']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solicitudes_pedidos');
	}

}
