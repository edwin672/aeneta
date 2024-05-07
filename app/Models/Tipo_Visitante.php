<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Visitante extends Model
{
    use HasFactory;

    protected $table = 'tipo_visitante';

    protected $primaryKey = 'idTipo_Visitante';

    protected $fillable = ['Descripcion'];

    public $timestamps = false;
}
