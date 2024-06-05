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
            $table->string('street');
            $table->string('home');
            $table->string('numAddress');
            $table->integer('id_colonia')->unsigned();
            $table->foreign("id_colonia")->references('id')->on('colonia');
            $table->integer('id_city')->unsigned();
            $table->foreign("id_city")->references('id')->on('ciudades');
            $table->string('type_of_place');
            $table->string('description');
            $table->string('how_to_get');
            $table->string('cell_phone');
            $table->string('number_fixed_number');
            $table->string('contact_form');
            $table->string('specify');
            $table->string('recruitment_data');
            $table->timestamps();

            /*$table->timestamp('email_verified_at')->nullable()->unique();*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

//Falto esto
// class pedido Extends Model
//{
//private $fillable=!['address','code','country','state'];    
//}


//Lo tienes mal puñeton
// class ProductoPediro extends Model
//{
//use HasFactory;    
//private $table='productos_pedidos';
//private $filleabel= ['id_pedido','id_producto', 'cantidad', 'precio']; 
//}


//lO VAS A OCUPAR SEGUN TU
//public function store(Request  $request)
//{
//add Pedido
//$validacion = request->validate([
    //'address'=>'required|3:
    //'code'=>'required|5:
    //'country'=>'required|5:
    //'state'=>'required|3:
    //'phone'=>'required|10:
    //'reference'=>'required|10:
//}