<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			$table->foreign('id_area', 'fk_productos_areas1')->references('id_area')->on('areas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('codigos_unspcs_id_codigo_unspcs', 'fk_productos_codigos_unspcs1')->references('id_codigo_unspcs')->on('codigos_unspcs')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('unidad_medida', 'fk_productos_unidades_medida1')->references('unidad_medida')->on('unidades_medida')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			$table->dropForeign('fk_productos_areas1');
			$table->dropForeign('fk_productos_codigos_unspcs1');
			$table->dropForeign('fk_productos_unidades_medida1');
		});
	}

}
