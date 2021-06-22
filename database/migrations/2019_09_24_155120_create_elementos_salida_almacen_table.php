<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElementosSalidaAlmacenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementos_salida_almacen', function(Blueprint $table)
		{
			$table->integer('id_elemento_salida', true);
			$table->integer('id_salida_alamcen')->index('fk_elementos_salida_almacen_salidas_almacen1');
			$table->integer('id_producto')->index('fk_elementos_entradas_almacen_productos10');
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
		Schema::drop('elementos_salida_almacen');
	}

}
