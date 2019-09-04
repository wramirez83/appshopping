<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProyectoFormativoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('proyecto_formativo', function(Blueprint $table)
		{
			$table->foreign('id_programa', 'fk_proyecto_formativo_programas1')->references('id_programa')->on('programas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('proyecto_formativo', function(Blueprint $table)
		{
			$table->dropForeign('fk_proyecto_formativo_programas1');
		});
	}

}
