<?php

namespace sisTurismo;

use Illuminate\Database\Eloquent\Model;

class Agencias extends Model
{
    protected $table='agencias';
    protected $primaryKey="idagencias";
    public $timestamps=false;

    protected $fillable=[
        'idagencias',
        'nombre',
        'direccion',
        'descripcion',
        'imagen',
        'email'
    ];

    protected $guarded=[

    ];
}
