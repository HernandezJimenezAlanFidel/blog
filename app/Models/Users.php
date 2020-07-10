<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 *
 */
class Users extends Model
{
	protected $table= 'users';
	protected $primaryKey = 'id';
	public $timestamps=false;

	 protected $fillable =[
	'id',
  'name',
  'email',
  'password'
    ];
}
