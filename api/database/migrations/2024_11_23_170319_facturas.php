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
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ordenCompleta')->unsigned();
            $table->foreign("id_ordenCompleta")->references('id')->on('orden');
            $table->string('folioFactura');
            $table->string('statusFolio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');    }
};
