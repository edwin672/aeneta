<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'trabajo_academico';

    protected $primaryKey = 'id_Departamento';

    protected $fillable = ['Descripcion'];

    public $timestamps = false;
}
