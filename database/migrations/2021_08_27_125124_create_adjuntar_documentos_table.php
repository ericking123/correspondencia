<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjuntarDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjuntar_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('estado',15)->nullable();
            $table->unsignedBigInteger('hoja_ruta_id')->index()->nullable();
            $table->foreign('hoja_ruta_id')->references('id')->on('hojarutas')->onDelete('cascade');

            $table->unsignedBigInteger('documento_id')->index()->nullable();
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
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
        Schema::dropIfExists('adjuntar_documentos');
    }
}
