<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntradasAlmacenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entradas_almacen', function(Blueprint $table)
		{
			$table->integer('id_entrada_almacen', true);
			$table->string('proveedor', 200)->default('MIGRACION');
			$table->integer('id_usuario')->index('fk_entradas_almacen_usuarios1');
			$table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('fecha_ingreso');
			$table->string('factura', 45)->nullable()->comment('Factura o contrato de remisión');
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
		Schema::drop('entradas_almacen');
	}

}
