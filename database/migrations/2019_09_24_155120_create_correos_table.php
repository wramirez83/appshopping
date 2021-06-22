<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorreosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correos', function(Blueprint $table)
		{
			$table->integer('id_correo', true);
			$table->integer('id_usuario')->index('fk_correos_usuarios1')->comment('quien envió');
			$table->string('destinatarios', 45)->nullable()->comment('id de los programas /varios');
			$table->string('asunto', 100);
			$table->text('cuerpo', 16777215);
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
		Schema::drop('correos');
	}

}
