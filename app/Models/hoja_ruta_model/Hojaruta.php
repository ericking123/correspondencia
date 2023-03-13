<?php

namespace App\Models\hoja_ruta_model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hojaruta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'generador_cod',
        'tipo_hoja',
        'asunto',
        'motivo_archivo'
    ];
}
