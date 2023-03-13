<?php
namespace App\Servicios;

use App\Models\Regional;

class RegionalServ
{
    public function get()
    {
        $regionales = Regional::get();
        $regionalArray[''] = 'Selecciona la Regional al que pertenece';
        foreach($regionales as $regional){
            $regionalArray[$regional->id] = [$regional->desg_telegrafico, $regional->nom_regional];
        }

        return $regionalArray;
    }
}