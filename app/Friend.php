<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
	protected $guarded = [];

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public static function isFriend($user_id, $friend_id)
    {
    	if (Friend::where('user_id', $user_id)->where('friend_id', $friend_id)->count() == 0)
    	{
    		return false;
    	}
    	return True;
    }
}
