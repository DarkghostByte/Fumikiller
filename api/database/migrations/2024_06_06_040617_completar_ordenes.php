<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('completarOrdenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orden')->unsigned();
            $table->foreign("id_orden")->references('id')->on('orden');
            $table->string('responsable');
            $table->string('ayudante');
            $table->integer('id_productosInternos')->unsigned();
            $table->foreign("id_productosInternos")->references('id')->on('productosInternos');
            $table->integer('id_productosInternos2')->unsigned();
            $table->foreign("id_productosInternos2")->references('id')->on('productosInternos');
            $table->string('productoExt1');
            $table->string('productoExt2');
            $table->string('noTrapear');
            $table->string('noIngresar');
            $table->string('otraDosis');
            $table->string('hora');
            $table->decimal('pago');
            $table->string('requiere1');
            $table->string('requiere2');
            $table->string('requiere3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('completarOrdenes');
    }
};