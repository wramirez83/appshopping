<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAprendicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aprendices', function(Blueprint $table)
		{
			$table->integer('id_aprendiz', true);
			$table->string('nombre', 45);
			$table->string('apellido', 45);
			$table->string('documento', 45);
			$table->date('fechaGrado');
			$table->integer('id_programa')->index('fk_aprendices_programas1');
			$table->string('ficha', 45)->nullable();
			$table->string('direccion', 100);
			$table->string('telefono', 65);
			$table->string('correo', 45);
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
		Schema::drop('aprendices');
	}

}
