<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente')->unsigned();
            $table->foreign("id_cliente")->references('id')->on('clientes');
            $table->string('plague1');
            $table->string('plague2');
            $table->string('date1');
            $table->string('date2');
            $table->string('time1');
            $table->string('time2');
            $table->string('hiring');
            $table->string('requires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};