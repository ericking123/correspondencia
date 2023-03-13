<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UseradminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Erick',
            'ci' => '5998313',
            'email' => 'erick@aasana.gob.bo',
            'es_funcionario' => 'true',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        //User::factory(9)->create(); //(factory): crea 9 registros aleatorios
    }
}
