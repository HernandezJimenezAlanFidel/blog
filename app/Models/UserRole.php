<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 *
 */
class UserRole extends Model
{
	protected $table= 'role_user';
	protected $primaryKey = 'id';
	public $timestamps=false;

	 protected $fillable =[
	'id',
  'role_id',
  'user_id'
    ];
}
