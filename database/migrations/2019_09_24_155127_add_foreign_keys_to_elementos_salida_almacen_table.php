<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToElementosSalidaAlmacenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('elementos_salida_almacen', function(Blueprint $table)
		{
			$table->foreign('id_producto', 'fk_elementos_entradas_almacen_productos10')->references('id_codigo_producto')->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_salida_alamcen', 'fk_elementos_salida_almacen_salidas_almacen1')->references('id_salida_almacen')->on('salidas_almacen')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('elementos_salida_almacen', function(Blueprint $table)
		{
			$table->dropForeign('fk_elementos_entradas_almacen_productos10');
			$table->dropForeign('fk_elementos_salida_almacen_salidas_almacen1');
		});
	}

}
