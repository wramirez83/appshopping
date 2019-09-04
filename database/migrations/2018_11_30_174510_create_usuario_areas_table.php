<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario_areas', function(Blueprint $table)
		{
			$table->integer('id_usuario_area', true);
			$table->integer('id_area')->index('fk_usuarios_areas_areas_formacion1');
			$table->integer('id_usuario')->nullable()->index('fk_usuario_areas_usuarios1');
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
		Schema::drop('usuario_areas');
	}

}
