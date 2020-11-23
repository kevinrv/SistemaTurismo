<?php

namespace sisTurismo;

use Illuminate\Database\Eloquent\Model;

class Lugar_Turistico extends Model
{
    protected $table='lugar_turistico';
    protected $primaryKey="idlugar_turistico";
    public $timestamps=false;

    protected $fillable=[
        'idlugar_turistico',
        'nombre',
        'descripcion',
        'imagen',
        'idProvincia'
    ];

    protected $guarded=[

    ];
}
