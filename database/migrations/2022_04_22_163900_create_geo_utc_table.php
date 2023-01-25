<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_utc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->unsignedBigInteger('localidad_id')->nullable();
            $table->unsignedBigInteger('barrio_id')->nullable();

            $table->foreign('region_id')
                    ->references('id')->on('regions')
                    ->onDelete('set null');


            $table->foreign('departamento_id')
                    ->references('id')->on('departments')
                    ->onDelete('set null');

            $table->foreign('municipio_id')
                    ->references('id')->on('municipalities')
                    ->onDelete('set null');

            $table->foreign('localidad_id')
                    ->references('id')->on('locations')
                    ->onDelete('set null');

            $table->foreign('barrio_id')
                    ->references('id')->on('neighborhoods')
                    ->onDelete('set null');




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
        Schema::dropIfExists('geo_utc');
    }
};
