<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantidadAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidad_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidad');
            $table->unsignedInteger('stock');
            $table->decimal('precio',8,2);
            $table->unsignedInteger('cantidad_individual');
            $table->string('prefijo');
            $table->unsignedBigInteger('area_padre_id');
            $table->unsignedBigInteger('area_hijo_id');
            $table->foreignId('fecha_id')->references('id')->on('fechas');
            $table->foreign('area_padre_id')->references('id')->on('areas');
            $table->foreign('area_hijo_id')->references('id')->on('areas');
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
        Schema::dropIfExists('cantidad_areas');
    }
}
