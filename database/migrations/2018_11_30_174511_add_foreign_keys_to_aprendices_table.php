<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAprendicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aprendices', function(Blueprint $table)
		{
			$table->foreign('id_programa', 'fk_aprendices_programas1')->references('id_programa')->on('programas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aprendices', function(Blueprint $table)
		{
			$table->dropForeign('fk_aprendices_programas1');
		});
	}

}
