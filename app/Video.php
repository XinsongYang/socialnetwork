<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $guarded = [];
	
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function post() 
    {
    	return $this->belongsTo(Post::class);
    }
}
