<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ColoniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colonias')->insert([
            'colonia'=>'Madero',
            'codigoPostal'=>'31807',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Che Guevara',
            'codigoPostal'=>'31735',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Seccion Hidalgo',
            'codigoPostal'=>'31803',
        ]);  
    }
}
