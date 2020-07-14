<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

	protected $table= 'venta';
	protected $primaryKey = 'idventa';
	public $timestamps=false;

    protected $fillable=[
        'idcliente',
        'fecha_venta',
        'idusuario',
        'metodo_pago',
        'total'
    ];
}
