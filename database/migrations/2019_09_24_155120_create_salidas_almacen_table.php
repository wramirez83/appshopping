<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalidasAlmacenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salidas_almacen', function(Blueprint $table)
		{
			$table->integer('id_salida_almacen', true);
			$table->integer('id_usuario')->index('fk_salidas_almacen_usuarios1')->comment('Usuario que ingresa el proceso');
			$table->integer('id_usuario_recibe')->comment('usuario quien recibe');
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
		Schema::drop('salidas_almacen');
	}

}
