<?php
namespace App\Helpers;
use App\Models\Parametro;

class Helper
{
    
    public static function IDGenerator($model, $trow, $length = 5, $prefix = 'XXX')
    {
        $parametro = Parametro::orderBy('id','desc')->first();
        $data = $model::orderBy('id','desc')->first();


        if(!$data || date("Y") == $parametro->gestion){
            $og_length = $length-1;
            $last_number = 1;
            $nuevoParametro_gestion = new Parametro();
            $nuevoParametro_gestion->gestion = date("Y")+1;
            $nuevoParametro_gestion->save();

        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $nro_code = substr($code, 0, 5);
            $actial_last_number = ($nro_code/1)*1;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }

        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $prefix.'/'.$zeros.$last_number;
    }
  
}

?>