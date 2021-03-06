<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = ['title', 'author', 'published_at'];
    public function borrows(){
    	return $this->hasMany(Borrow::class);
    }
}
