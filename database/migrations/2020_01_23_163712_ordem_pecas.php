<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdemPecas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_pecas', function (Blueprint $table) {
            $table->integer('ordem_id')->unsigned();
			$table->integer('pecas_id')->unsigned()->index('fk_ordem_has_pecas');
			$table->primary(['ordem_id','pecas_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_pecas');
    }
}
