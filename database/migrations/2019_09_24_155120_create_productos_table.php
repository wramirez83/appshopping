<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->integer('id_codigo_producto', true);
			$table->integer('id_area')->nullable()->index('fk_productos_areas1');
			$table->integer('idUsuario')->index('fk_productos_usuarios1');
			$table->string('nombre', 45)->nullable();
			$table->string('detalles_producto', 200)->nullable();
			$table->integer('precio_unitario')->nullable();
			$table->string('unidad_medida', 45)->nullable()->index('fk_productos_unidades_medida1');
			$table->integer('codigos_unspcs_id_codigo_unspcs')->index('fk_productos_codigos_unspcs1');
			$table->string('estado_producto', 45)->nullable()->default('Activo')->comment('Activo
Inactivo
Pendiente');
			$table->binary('foto')->nullable();
			$table->string('tipo_foto', 30)->nullable();
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
		Schema::drop('productos');
	}

}
