<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parametro;

class ParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gestion_actual = date("Y") + 1;

        $parametro = Parametro::create([
            'gestion' => $gestion_actual
        ]);
    }
}
