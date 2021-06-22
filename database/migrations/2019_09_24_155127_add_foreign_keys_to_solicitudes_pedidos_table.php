<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSolicitudesPedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('solicitudes_pedidos', function(Blueprint $table)
		{
			$table->foreign('pedidos_id_pedido', 'fk_solicitudes_has_pedidos_pedidos1')->references('id_pedido')->on('pedidos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('solicitudes_id_solicitud', 'fk_solicitudes_has_pedidos_solicitudes1')->references('id_solicitud')->on('solicitudes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('solicitudes_pedidos', function(Blueprint $table)
		{
			$table->dropForeign('fk_solicitudes_has_pedidos_pedidos1');
			$table->dropForeign('fk_solicitudes_has_pedidos_solicitudes1');
		});
	}

}
