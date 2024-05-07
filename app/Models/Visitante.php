<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $table = 'visitante';

    protected $primaryKey = 'id_Visitante';

    protected $fillable = ['Nombre_Visitante', 'App_Visitante', 'Apm_Visitante', 'Correo_Visitante', 'TipoVisitante'];

    public $timestamps = false;
}
