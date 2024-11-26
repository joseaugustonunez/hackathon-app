<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('item')->nullable();
            $table->string('canal')->nullable();
            $table->date('fecha_recepcion')->nullable();
            $table->year('anio_ingreso')->nullable();
            $table->string('entidad_sujeta_control')->nullable();
            $table->string('ambito_geografico')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->string('recepcion')->nullable();
            $table->string('auditor_recepcion')->nullable();
            $table->date('fecha_evaluacion')->nullable();
            $table->string('resultado_recepcion')->nullable();
            $table->string('auditor_evaluacion')->nullable();
            $table->date('fecha_culminacion')->nullable();
            $table->string('resultado_evaluacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('denuncias');
    }
};
