<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->integer('id_usuario', true);
			$table->integer('id_tipo_documento')->nullable()->index('fk_usuarios_tipos_documentos1');
			$table->string('correo', 60)->unique('correo_UNIQUE');
			$table->string('nombre_usuario', 45)->nullable();
			$table->string('clave', 60);
			$table->string('documento', 18)->nullable();
			$table->timestamps();
			$table->string('remember_token', 95)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
