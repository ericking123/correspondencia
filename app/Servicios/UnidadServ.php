<?php
namespace App\Servicios;

use App\Models\Organigrama;

class UnidadServ
{
    public function get()
    {
        $datosOrganigrama = Organigrama::get();
        $unidadArray[''] = 'Selecciona la Unidad Dependiente';
        foreach($datosOrganigrama as $unidad){
            $unidadArray[$unidad->id] = [$unidad->desg_teleg, $unidad->nombre_unidad];
        }

        return $unidadArray;
    }
}