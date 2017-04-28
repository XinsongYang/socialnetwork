<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $fillable = ['user_id', 'title', 'body'];
    protected $guarded = [];

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function comments() 
    {
    	return $this->hasMant(Comment::class);
    }

    public function addComment($body)
    {
    	$this->comments()->create(compact('body'));
    }

}
