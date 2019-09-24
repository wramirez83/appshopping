<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosSolicitudesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos_solicitudes', function(Blueprint $table)
		{
			$table->integer('id_productos_solicitudes', true);
			$table->integer('solicitudes_id_solicitud')->nullable()->index('fk_solicitudes_has_productos_solicitudes1');
			$table->integer('productos_id_codigo_producto')->nullable()->index('fk_solicitudes_has_productos_productos1');
			$table->float('precio', 10, 0);
			$table->float('cantidad', 10, 0);
			$table->string('observaciones', 500)->nullable();
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
		Schema::drop('productos_solicitudes');
	}

}
