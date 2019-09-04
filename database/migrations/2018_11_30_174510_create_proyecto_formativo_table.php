<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProyectoFormativoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proyecto_formativo', function(Blueprint $table)
		{
			$table->integer('id_proyecto_formativo', true);
			$table->integer('id_programa')->index('fk_proyecto_formativo_programas1');
			$table->string('nombre_proyecto', 150)->nullable();
			$table->float('codigo', 10, 0)->nullable();
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
		Schema::drop('proyecto_formativo');
	}

}
