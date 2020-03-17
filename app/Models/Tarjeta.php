<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 *
 */
class Tarjeta extends Model
{
	protected $table= 'tarjeta';
	protected $primaryKey = 'idtarjeta';
	public $timestamps=false;

	 protected $fillable =[
	'idtarjeta',
  'tipo',
  'fondo_disponible',
  'activo'
    ];
}
