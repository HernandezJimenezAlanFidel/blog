<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 *
 */
class Producto extends Model
{
	protected $table= 'producto';
	protected $primaryKey = 'idproducto';
	public $timestamps=false;

	 protected $fillable =[
	'idproducto',
  'nombre',
  'cantidad',
  'precio',
  'categoria',
  'imagen',
	'imagen_fondo',
	'activo'
    ];
}
