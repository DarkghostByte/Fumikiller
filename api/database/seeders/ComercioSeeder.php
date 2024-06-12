<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comercios')->insert([
            'comercio'=>'Abarrotes',
        ]);
        DB::table('comercios')->insert([
            'comercio'=>'Mercado',
        ]);
        DB::table('comercios')->insert([
            'comercio'=>'Bodega',
        ]);  
    }
}
