<?php

namespace sisTurismo;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamento';
    protected $primaryKey="iddepartamento";
    public $timestamps=false;

    protected $fillable=[
        'iddepartamento',
        'nom_departamento'
    ];

    protected $guarded=[

    ];
}
