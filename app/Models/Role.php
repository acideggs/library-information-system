<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
    	return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    public function canAccesses(){
    	return $this->belongsToMany(CanAccess::class, 'can_access_role', 'role_id', 'can_access');
    }
}
