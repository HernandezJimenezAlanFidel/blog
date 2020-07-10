<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 *
 */
class Roles extends Model
{
	protected $table= 'roles';
	protected $primaryKey = 'id';
	public $timestamps=false;

	 protected $fillable =[
	'id',
  'name',
  'description'
    ];
}
