<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
	protected $fillable = ['user_id', 'book_id', 'borrow_at', 'return_at', 'deadline', 'is_ontime'];
	public $timestamps = false;

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function book(){
    	return $this->belongsTo(Book::class);
    }
}
