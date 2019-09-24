<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToElementosEntradasAlmacenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('elementos_entradas_almacen', function(Blueprint $table)
		{
			$table->foreign('id_entrada_almacen', 'fk_elementos_entradas_almacen_entradas_almacen1')->references('id_entrada_almacen')->on('entradas_almacen')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_producto', 'fk_elementos_entradas_almacen_productos1')->references('id_codigo_producto')->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('elementos_entradas_almacen', function(Blueprint $table)
		{
			$table->dropForeign('fk_elementos_entradas_almacen_entradas_almacen1');
			$table->dropForeign('fk_elementos_entradas_almacen_productos1');
		});
	}

}
