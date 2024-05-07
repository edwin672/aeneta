<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docente';

    protected $primaryKey = 'ID_Docente';

    protected $fillable = ['Nombre_Docente', 'App_Docente', 'Apm_Docente', 'Correo_Docente', 'Id_departamento'];

    public $timestamps = false;
}
