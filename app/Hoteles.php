<?php

namespace sisTurismo;

use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    protected $table='hoteles';
    protected $primaryKey="idhoteles";
    public $timestamps=false;

    protected $fillable=[
        'idhoteles',
        'nombre',
        'direccion',
        'imagen',
        'email',
        'idlugar_turistico'
    ];

    protected $guarded=[

    ];
}
