<?php

namespace sisTurismo;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = "idpagos";
    public $timestamps = false;

    protected $fillable = [
        'idpaquete',
        'Tipo',
        'costo'
    ];

    protected $guarded = [];
}
