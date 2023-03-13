<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Regional;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regional = Regional::create([
            'nom_regional' => 'OFICINA CENTRAL',
            'aeropuerto' => 'Oficina Central',
            'desg_telegrafico' => 'OF-CENTRAL',
            'telefono' => '22541120',
            'direccion' => 'Calle Reyes Ortiz Esq. Federico Suazo Nro. 72'
        ]);

        $regional = Regional::create([
            'nom_regional' => 'REGIONAL LA PAZ',
            'aeropuerto' => 'Aeropuerto Internacional de El Alto',
            'desg_telegrafico' => 'SLLP',
            'telefono' => '22254003',
            'direccion' => 'Kilometro x avenida abc'
        ]);

        $regional = Regional::create([
            'nom_regional' => 'REGIONAL COCHABAMBA',
            'aeropuerto' => 'Aeropuerto Internacional Jorge Wilsterman',
            'desg_telegrafico' => 'SLCB',
            'telefono' => '32500642',
            'direccion' => 'Avenida xxx terminal zzz'
        ]);

        $regional = Regional::create([
            'nom_regional' => 'REGIONAL SANTA CRUZ',
            'aeropuerto' => 'Aeropuerto Internacional Viru Viru',
            'desg_telegrafico' => 'SLVR',
            'telefono' => '45211025',
            'direccion' => 'Avenida yy Esq. Real Plaza'
        ]);

        $regional = Regional::create([
            'nom_regional' => 'REGIONAL TRINIDAD',
            'aeropuerto' => 'Aeropuerto Internacional Suck Breich',
            'desg_telegrafico' => 'SLTR',
            'telefono' => '52221544',
            'direccion' => 'Kilometro 44 Final La Guardia'
        ]);

    }
}
