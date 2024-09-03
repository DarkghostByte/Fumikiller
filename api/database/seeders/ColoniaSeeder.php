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
        // Nuevo Casas Grandes 
        DB::table('colonias')->insert([
            'colonia'=>'1ro de Mayo',
            'codigoPostal'=>'31735',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Acción Popular',
            'codigoPostal'=>'31778',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Aeropuerto',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Alamedas',
            'codigoPostal'=>'31704',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Álamos',
            'codigoPostal'=>'31710',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Ampliación Zapata',
            'codigoPostal'=>'91777',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Arboledas',
            'codigoPostal'=>'31704',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Benito Juárez',
            'codigoPostal'=>'31770',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Buena Fe',
            'codigoPostal'=>'31806',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Burócrata',
            'codigoPostal'=>'31750',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo Catorce (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo Cinco (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo Cuatro (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo Diez (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo Nueve (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo  Seis (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo Siete (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Campo Tres (El Capulín)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Che Guevara',
            'codigoPostal'=>'31735',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Colinas del Sur',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Constitución Democratica',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'División del Norte',
            'codigoPostal'=>'31755',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Dublán',
            'codigoPostal'=>'31710',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'',
            'codigoPostal'=>'',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Fiesta Diamante',
            'codigoPostal'=>'31750',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Francisco I. Madero',
            'codigoPostal'=>'31807',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Francisco Villa',
            'codigoPostal'=>'31778',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Hacienda San Isidro',
            'codigoPostal'=>'31730',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Héroes de la Reforma',
            'codigoPostal'=>'31777',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Hidalgo (Ejido)',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Industrial',
            'codigoPostal'=>'31760',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'INFONAVIT Cobra',
            'codigoPostal'=>'31730',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'INFONAVIT Paquimé C.T.M',
            'codigoPostal'=>'31755',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Jardines de Nuevo Casas Grandes',
            'codigoPostal'=>'31778',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Juan José Salas',
            'codigoPostal'=>'31789',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Juan Pablo II',
            'codigoPostal'=>'31704',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'La Rinconada',
            'codigoPostal'=>'31777',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'La Victoria',
            'codigoPostal'=>'31730',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Lagunas',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Los Arcos',
            'codigoPostal'=>'31720',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Los Encinos',
            'codigoPostal'=>'31770',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Lucio Cabañas',
            'codigoPostal'=>'31758',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Luis Donaldo Colosio',
            'codigoPostal'=>'31758',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Magisterial',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Miguel Angel Escárcega',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Misiones',
            'codigoPostal'=>'31783',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Nadadores',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Nogalera',
            'codigoPostal'=>'31720',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Nueva',
            'codigoPostal'=>'31750',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Nueva Dublan',
            'codigoPostal'=>'31719',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Nuevo Casas Grandes Centro',
            'codigoPostal'=>'31700',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Nuevo Triunfo',
            'codigoPostal'=>'31758',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Obrera',
            'codigoPostal'=>'31750',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Parque Industrial Paquimé',
            'codigoPostal'=>'31755',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Praderas del Oriente',
            'codigoPostal'=>'31704',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'PRI',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Real del Bosque',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Regidores',
            'codigoPostal'=>'31780',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'San Isidro',
            'codigoPostal'=>'31730',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'San Pedro Corralitos',
            'codigoPostal'=>'31810',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Sección Hidalgo',
            'codigoPostal'=>'31803',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Tierra y Libertad',
            'codigoPostal'=>'31778',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Villa Hermosa',
            'codigoPostal'=>'31770',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Villas del Tecnologico',
            'codigoPostal'=>'31783',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Vistas del Sol',
            'codigoPostal'=>'31730',
        ]);

        // Casas Grandes
        DB::table('colonias')->insert([
            'colonia'=>'Anchondo',
            'codigoPostal'=>'31856',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'CDP',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Centro',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Cuahtémoc',
            'codigoPostal'=>'31855',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'El Adobe',
            'codigoPostal'=>'31861',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'El Rucio',
            'codigoPostal'=>'31861',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'García',
            'codigoPostal'=>'31860',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Granjas',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Guadalupe Victoria',
            'codigoPostal'=>'31851',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Hernández (Jobales)',
            'codigoPostal'=>'31860',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Heroína',
            'codigoPostal'=>'31863',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Ignacio  Zaragoza (El Willy)',
            'codigoPostal'=>'31858',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Industrial',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Juan Mata Ortiz (Pearson)',
            'codigoPostal'=>'31861',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Colonia Juarez',
            'codigoPostal'=>'31857',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'La Esperanza',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Lindavista',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Los Altos',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Moctezuma',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Pacheco',
            'codigoPostal'=>'31862',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Profesor Garcia Sánchez',
            'codigoPostal'=>'31851',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Progreso',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Quebale',
            'codigoPostal'=>'31858',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'San Antonio',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'San Diego',
            'codigoPostal'=>'31857',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'San José',
            'codigoPostal'=>'31850',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'San José del Sur',
            'codigoPostal'=>'31854',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Santa Rosa',
            'codigoPostal'=>'31861',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Sección el Oro',
            'codigoPostal'=>'31859',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Sección Enríquez',
            'codigoPostal'=>'31854',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Vicente Guerrero (Valle Seco)',
            'codigoPostal'=>'31858',
        ]);


        // Galeana
        DB::table('colonias')->insert([
            'colonia'=>'Lagunitas',
            'codigoPostal'=>'31870',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Galeana',
            'codigoPostal'=>'31870',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'San Joaquín',
            'codigoPostal'=>'31874',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Angostura',
            'codigoPostal'=>'31870',
        ]);
        DB::table('colonias')->insert([
            'colonia'=>'Santa Fe',
            'codigoPostal'=>'31870',
        ]);











        //Anteriores
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
