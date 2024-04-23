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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname1');
            $table->string('lastname2');
            $table->string('tradename');
            $table->string('home')->unique();
            $table->string('cp');
            $table->string('cologne');
            $table->string('city');
            $table->string('type_of_place');
            $table->string('description');
            $table->string('how_to_get');
            $table->string('cell_phone');
            $table->string('number_fixed_number');
            $table->string('contact_form');
            $table->string('specify');
            $table->timestamps();

            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
