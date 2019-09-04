<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProponentesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proponentes', function(Blueprint $table)
		{
			$table->integer('id_proponente')->primary();
			$table->string('nombre_proponente', 45)->nullable();
			$table->integer('nit_proponente')->nullable();
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
		Schema::drop('proponentes');
	}

}
