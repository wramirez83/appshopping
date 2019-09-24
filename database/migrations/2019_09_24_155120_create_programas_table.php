<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgramasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programas', function(Blueprint $table)
		{
			$table->integer('id_programa', true);
			$table->string('nombre_programa', 100)->nullable();
			$table->float('codigo', 10, 0)->nullable();
			$table->integer('version')->nullable();
			$table->string('estado', 8)->nullable()->default('Activo')->comment('Activo
Inactivo');
			$table->timestamps();
			$table->string('nivel', 45)->nullable();
			$table->string('red', 500)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('programas');
	}

}
