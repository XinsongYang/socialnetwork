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

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function video()
    {         
        return $this->hasOne(Video::class);
    }

    public function comments() 
    {
    	return $this->hasMany(Comment::class);
    }

    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function addImage($path)
    {
        $this->images()->create(compact('path'));
    }

    public function addVideo($path)
    {
        $this->videos()->create(compact('path'));
    }

    public function addComment($body)
    {
    	$this->comments()->create(compact('body'));
    }

}
