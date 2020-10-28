<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 *
 */
class Cliente extends Model
{
	protected $table= 'cliente';
	protected $primaryKey = 'idcliente';
	public $timestamps=false;

	 protected $fillable =[
	'idcliente',
  'nombre',
  'direccion',
  'sexo',
  'fecha_nac',
  'correo',
  'telefono',
  'idtarjeta',
	'activo'
    ];
}
