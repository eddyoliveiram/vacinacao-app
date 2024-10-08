<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleTable extends Migration
{
    public function up()
    {
        Schema::create('controle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_funcionario')->constrained('funcionarios')->onDelete('cascade');
            $table->foreignId('id_vacina')->constrained('vacinas')->onDelete('cascade');
            $table->integer('dose');
            $table->date('data_aplicacao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('controle');
    }
}
