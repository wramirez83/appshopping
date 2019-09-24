<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorreosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('correos', function(Blueprint $table)
		{
			$table->foreign('id_usuario', 'fk_correos_usuarios1')->references('id_usuario')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('correos', function(Blueprint $table)
		{
			$table->dropForeign('fk_correos_usuarios1');
		});
	}

}
