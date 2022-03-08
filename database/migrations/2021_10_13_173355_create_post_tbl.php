<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ciudades', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('aerolineas', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->unsignedbigInteger('city_id');
            $table->boolean('disponibilidad');
            
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('ciudades');
        });

        Schema::create('city_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('city_id');

            $table->foreign('company_id')->references('id')->on('aerolineas');
            $table->foreign('city_id')->references('id')->on('ciudades');
            $table->timestamps();
        });

        Schema::create('vuelos', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('name_aerolinea_id');
            $table->timestamp('hora_despegue');
            $table->date('hora_llegada');
            $table->unsignedBigInteger('ciudad_origen');
            $table->unsignedBigInteger('ciudad_destino');

            $table->foreign('ciudad_origen')
            ->references('id')
            ->on('ciudades');

            $table->foreign('ciudad_destino')
            ->references('id')
            ->on('ciudades');
            
            $table->foreign('name_aerolinea_id')
            ->references('id')
            ->on('aerolineas');

            $table->primary(['name_aerolinea_id', 'id']); 

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
        Schema::dropIfExists('aerolinea');
        Schema::dropIfExists('ciudades');
        Schema::dropIfExists('vuelos');
    }
}
