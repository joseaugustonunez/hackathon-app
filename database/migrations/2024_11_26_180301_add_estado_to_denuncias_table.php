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
        Schema::table('denuncias', function (Blueprint $table) {
            $table->enum('estado', ['Pendiente', 'Aprobado', 'Rechazado', 'Proceso'])
                ->default('Pendiente');
        });
    }

    public function down()
    {
        Schema::table('denuncias', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};
