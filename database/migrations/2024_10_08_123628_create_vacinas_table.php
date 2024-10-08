<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacinasTable extends Migration
{
    public function up()
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('lote');
            $table->date('data_validade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacinas');
    }
}
