<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncias extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'canal',
        'fecha_recepcion',
        'anio_ingreso',
        'entidad_sujeta_control',
        'ambito_geografico',
        'provincia',
        'distrito',
        'fecha_registro',
        'recepcion',
        'auditor_recepcion',
        'fecha_evaluacion',
        'resultado_recepcion',
        'auditor_evaluacion',
        'fecha_culminacion',
        'resultado_evaluacion',
    ];
}
