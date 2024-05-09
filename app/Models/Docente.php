<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docente';

    protected $primaryKey = 'id_docente';

    protected $keyType = 'string';

    protected $fillable = ['nombre', 'apellido', 'correo', 'id_departamento'];

    public $timestamps = false;

    public function trabajoAcademicoDirectores()
    {
        return $this->belongsToMany(TrabajoAcademico::class);
    }

    public function trabajoAcademicoSinodales()
    {
        return $this->belongsToMany(TrabajoAcademico::class);
    }
}
