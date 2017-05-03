<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function createProfile()
    {
        Profile::create([
            'user_id' => $this->id,
            'avatar' => 'default/avatar.png',
            'bio' => '',
            'location' => '',
            'job' => ''
        ]);
    }

    public function friends()
    {
        return $this->hasMany(Friend::class);
    }

    public function addFriend($id)
    {
        Friend::create([
            'user_id' => $this->id,
            'friend_id' => $id
        ]);
    }

    public function removeFriend($id)
    {
        Friend::where('user_id', $this->id)
              ->where('friend_id', $id)
              ->delete();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }
}
