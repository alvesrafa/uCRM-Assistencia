<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ordens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('defeito');
            $table->string('observacoes');
            $table->integer('numero');
            $table->double('desconto', 4, 2)->nullable();
            $table->double('valor', 4, 2);
            $table->integer('cliente_id')->unsigned();
            $table->integer('tecnico_id')->unsigned();
            $table->integer('aparelho_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('tecnico_id')->references('id')->on('tecnicos');
            $table->foreign('aparelho_id')->references('id')->on('aparelhos')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('ordems');
    }
}
