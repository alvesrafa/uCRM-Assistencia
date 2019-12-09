<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
    public function up()
	{
		Schema::create('cidades', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 100);
			$table->integer('estado_id')->index('fk_cidade_estado');
		});
	}

	public function down()
	{
		Schema::drop('cidades');
	}
}
