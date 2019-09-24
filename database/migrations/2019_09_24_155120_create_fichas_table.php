<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFichasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fichas', function(Blueprint $table)
		{
			$table->integer('id_ficha', true);
			$table->integer('id_proyecto_formativo');
			$table->integer('ficha');
			$table->string('estado', 8)->nullable()->default('Activo')->comment('Activo
Inactivo');
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
		Schema::drop('fichas');
	}

}
