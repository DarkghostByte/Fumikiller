<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductosExternosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productosExternos')->insert([
            'productoExt'=>'Producto #1',
        ]);
        DB::table('productosExternos')->insert([
            'productoExt'=>'Producto #2',
        ]);
        DB::table('productosExternos')->insert([
            'productoExt'=>'Producto #3',
        ]);  
    }
}
