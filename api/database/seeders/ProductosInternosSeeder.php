<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosInternosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productosInternos')->insert([
            'productoInt'=>'Producto #1',
        ]);
        DB::table('productosInternos')->insert([
            'productoInt'=>'Producto #2',
        ]);
        DB::table('productosInternos')->insert([
            'productoInt'=>'Producto #3',
        ]);  
    }
}