<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_sectors', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',8,2);
            $table->string('color');
            $table->foreignId('sector_id')->references('id')->on('sectors');
            $table->foreignId('area_id')->references('id')->on('areas');
            $table->foreignId('evento_localidad_id')->references('id')->on('evento_localidads')->onDelete('cascade');
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
        Schema::dropIfExists('area_sectors');
    }
}
