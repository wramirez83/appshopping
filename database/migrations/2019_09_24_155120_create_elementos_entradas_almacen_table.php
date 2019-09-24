<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElementosEntradasAlmacenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementos_entradas_almacen', function(Blueprint $table)
		{
			$table->integer('id_elemento_entrada', true);
			$table->integer('id_entrada_almacen')->index('fk_elementos_entradas_almacen_entradas_almacen1');
			$table->integer('id_producto')->index('fk_elementos_entradas_almacen_productos1');
			$table->float('cantidad', 10, 0);
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
		Schema::drop('elementos_entradas_almacen');
	}

}
