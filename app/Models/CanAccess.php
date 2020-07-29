<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CanAccess extends Model
{
	protected $table = 'can_accesses';
	protected $fillable = ['role_id', 'can_access'];

    public function roles(){
    	return $this->belongToMany(Role::class, 'can_access_role', 'can_access', 'role_id');
    }
}
