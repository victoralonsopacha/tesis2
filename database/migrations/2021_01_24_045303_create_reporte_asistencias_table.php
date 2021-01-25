<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_asistencias', function (Blueprint $table) {
            $table->id('id_reporte');
            $table->string('cedula')->nullable();
            $table->string('apellido')->nullable();
            $table->string('nombre')->nullable();
            $table->integer('anio')->nullable();
            $table->integer('mes_numero')->nullable();
            $table->string('mes_nombre')->nullable();
            $table->date('fecha')->nullable();
            $table->string('hora_entrada')->nullable();
            $table->string('hora_salida')->nullable();
            $table->string('tiempo_total')->nullable();
            
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
        Schema::dropIfExists('reporte_asistencias');
    }
}
