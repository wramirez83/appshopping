<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSalidasAlmacenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('salidas_almacen', function(Blueprint $table)
		{
			$table->foreign('id_usuario', 'fk_salidas_almacen_usuarios1')->references('id_usuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('salidas_almacen', function(Blueprint $table)
		{
			$table->dropForeign('fk_salidas_almacen_usuarios1');
		});
	}

}
