<?php
namespace App\Servicios;

use App\Models\Cargo;

class CargoServ
{
    public function get()
    {
        $datosCargo = Cargo::get();
        //$cargoArray[''] = 'Selecciona el Cargo Perteneciente';
        foreach($datosCargo as $cargo){
            $cargoArray[$cargo->id] = [$cargo->id, $cargo->nombre_cargo];
        }

        return $cargoArray;
    }
}