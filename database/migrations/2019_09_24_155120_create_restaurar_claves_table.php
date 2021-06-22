<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurarClavesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restaurar_claves', function(Blueprint $table)
		{
			$table->integer('id_restaurar_claves', true);
			$table->string('correo', 60)->nullable();
			$table->string('token', 60)->nullable();
			$table->dateTime('create_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('restaurar_claves');
	}

}
