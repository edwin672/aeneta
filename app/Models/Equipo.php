<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo';

    protected $primaryKey = 'id_Equipos';

    protected $fillable = ['id_Estudiante', 'Identificador'];

    public $timestamps = false;
}
