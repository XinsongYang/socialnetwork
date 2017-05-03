<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
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

    public static function isLiked($user_id, $post_id)
    {
        if (Like::where('user_id', $user_id)->where('post_id', $post_id)->count() == 0)
        {
            return false;
        }
        return true;
    }
}
