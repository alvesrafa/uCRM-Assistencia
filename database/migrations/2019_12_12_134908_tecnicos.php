<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tecnicos extends Migration
{
    public function up()
    {
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->string('documento')->unique();
            $table->string('email')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('tecnicos');
    }
}
