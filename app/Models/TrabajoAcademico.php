<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoAcademico extends Model
{
    use HasFactory;

    protected $table = 'trabajo_academico';

    protected $primaryKey = 'idTrabajo_Academico';

    protected $fillable = ['Tipo_Trabajo', 'Titulo', 'Descripcion', 'Fecha_Inicio', 'Fecha_Final', 'id_Equipo', 'id_Sinodale', 'id_Director', 'idArea'];

    public $timestamps = false;
}
