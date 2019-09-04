<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFichasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fichas', function(Blueprint $table)
		{
			$table->foreign('id_proyecto_formativo', 'fk_fichas_proyecto_formativo1')->references('id_proyecto_formativo')->on('proyecto_formativo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fichas', function(Blueprint $table)
		{
			$table->dropForeign('fk_fichas_proyecto_formativo1');
		});
	}

}
