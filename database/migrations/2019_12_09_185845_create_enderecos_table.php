<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    public function up()
	{
		Schema::create('enderecos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('logradouro');
			$table->integer('numero');
			$table->string('bairro', 100);
			$table->integer('cidade_id')->index('fk_endereco_cidade1');
			$table->string('cep', 8)->nullable();
			$table->string('complemento')->nullable();
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enderecos');
	}
}
