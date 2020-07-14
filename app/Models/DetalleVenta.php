<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table= 'detalle_venta';
	protected $primaryKey = 'idventadetalle';
	public $timestamps=false;

    protected $fillable=[
        'idventa',
        'idproducto',
        'cantidad',
        'monto'
    ];
}
