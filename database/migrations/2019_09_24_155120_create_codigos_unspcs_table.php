<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCodigosUnspcsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('codigos_unspcs', function(Blueprint $table)
		{
			$table->integer('id_codigo_unspcs')->primary();
			$table->string('descripcion', 200);
			$table->string('estado', 45)->nullable()->default('Activo');
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
		Schema::drop('codigos_unspcs');
	}

}
