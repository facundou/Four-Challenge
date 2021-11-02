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

        Schema::create('aerolinea', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->boolean('disponibilidad');
            $table->timestamps();
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('fly', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('name_aerolinea');
            $table->date('hora_despegue');
            $table->date('hora_llegada');
            $table->unsignedBigInteger('ciudad_origen');
            $table->unsignedBigInteger('ciudad_destino');

            $table->foreign('ciudad_origen')
            ->references('id')
            ->on('cities');

            $table->foreign('ciudad_destino')
            ->references('id')
            ->on('cities');
            
            $table->foreign('name_aerolinea')
            ->references('id')
            ->on('aerolinea');

            $table->primary(['name_aerolinea', 'id']); 


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
        Schema::dropIfExists('cities');
        Schema::dropIfExists('fly');
    }
}
