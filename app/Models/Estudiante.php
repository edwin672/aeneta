<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiante';

    protected $primaryKey = 'id_estudiante';

    protected $keyType = 'string';

    protected $fillable = ['nombre', 'apellido', 'correo', 'id_trabajoAcademico'];

    public $timestamps = false;

    public function trabajoAcademico()
    {
        return $this->belongsTo(TrabajoAcademico::class);
    }
}
