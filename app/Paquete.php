<?php

namespace sisTurismo;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table='paquete';
    protected $primaryKey="idpaquete";
    public $timestamps=false;

    protected $fillable=[
        'idpaquete',
        'precio',
        'num_persona',
        'descuento',
        'idlugar_turistico',
        'idagencias'
    ];

    protected $guarded=[

    ];
}

