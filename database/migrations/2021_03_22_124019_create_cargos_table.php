<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('identificador', 15)->nullable();
            $table->string('nombre_cargo', 50)->nullable()->unique();
            $table->string('estado', 15)->nullable();
            $table->unsignedBigInteger('organigrama_id')->index()->nullable();
            $table->foreign('organigrama_id')->references('id')->on('organigramas')->onDelete('cascade');
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
        Schema::dropIfExists('cargos');
    }
}
