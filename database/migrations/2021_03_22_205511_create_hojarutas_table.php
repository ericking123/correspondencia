<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHojarutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hojarutas', function (Blueprint $table) {
            $table->id();
            $table->text('generador_cod')->nullable();
            $table->string('tipo_hoja', 15)->nullable();
            $table->text('asunto')->nullable();
            $table->integer('nro_doc')->nullable();
            $table->string('estado_hoja', 20)->nullable();
            $table->string('motivo_archivo', 100)->nullable();
            $table->string('motivo_reactivado', 100)->nullable();
            $table->string('desarchivado_por', 80)->nullable();
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
        Schema::dropIfExists('hojarutas');
    }
}
