<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdemMaoObras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_mao_obras', function (Blueprint $table) {
            $table->integer('ordem_id')->unsigned();
			$table->integer('maoobra_id')->unsigned()->index('fk_ordem_has_maoobra');
			$table->primary(['ordem_id','maoobra_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_mao_obras');
    }
}
