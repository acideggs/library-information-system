<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function borrows(){
        return $this->hasMany(Borrow::class);
    }

    public function checkRole($route_name){
        $route_id = CanAccess::where('route_name', $route_name)->first()->id;
        $roles = $this->roles;
        foreach ($roles as $role) {
            foreach ($role->canAccesses as $canAccess) {
                if ($route_id === $canAccess->id) {
                    return true;
                }
            }
        }
        return false;
    }
}
