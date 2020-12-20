<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_asistencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_permiso');
            $table->integer('id_justificacion');
            $table->integer('id_reposicion');
            $table->date('fecha');
            $table->integer('dias_permiso');
            $table->integer('dias_faltas');
            $table->integer('total_atrasos');
            $table->integer('total_dias_laborados');
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
        Schema::dropIfExists('control_asistencia');
    }
}
