<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiante';

    protected $primaryKey = 'Boleta_Estudiante';

    protected $fillable = ['Nombre_Estudiante', 'App_Estudiante', 'Apm_Estudiante', 'Correo_Estudiante'];

    public $timestamps = false;
}
