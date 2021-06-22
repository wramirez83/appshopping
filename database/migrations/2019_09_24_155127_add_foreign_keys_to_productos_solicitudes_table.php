<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductosSolicitudesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productos_solicitudes', function(Blueprint $table)
		{
			$table->foreign('productos_id_codigo_producto', 'fk_solicitudes_has_productos_productos1')->references('id_codigo_producto')->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('solicitudes_id_solicitud', 'fk_solicitudes_has_productos_solicitudes1')->references('id_solicitud')->on('solicitudes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('productos_solicitudes', function(Blueprint $table)
		{
			$table->dropForeign('fk_solicitudes_has_productos_productos1');
			$table->dropForeign('fk_solicitudes_has_productos_solicitudes1');
		});
	}

}
