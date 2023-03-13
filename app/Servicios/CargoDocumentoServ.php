<?php
namespace App\Servicios;

use App\Models\Cargo_has_documento;

class CargoDocumentoServ
{
    public function get()
    {
        $datosCargoDocumento = Cargo_has_documento::get();
        foreach($datosCargoDocumento as $cardoc){
            $cargoDocumentoArray[$cardoc->id] = [$cardoc->id, $cardoc->documento_id, $cardoc->cargo_id];
        }

        return $cargoDocumentoArray;
    }
}