<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToPermisosProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permiso_profesors', function (Blueprint $table) {
            //
            $table->boolean('estado')->nullable()->after('tipo_permiso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('permiso_profesors', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
}
