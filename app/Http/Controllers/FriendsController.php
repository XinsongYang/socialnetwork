<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Friend;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $friends = auth()->user()->friends;
        return view('friends.show', compact('friends'));
    }

    public function add($id)
    {
    	if (!Friend::isFriend(auth()->id(), $id))
    	{
    		auth()->user()->addFriend($id);
    		User::find($id)->addFriend(auth()->id());
    	}
    	return redirect(User::find($id)->name);
    }

    public function remove($id)
    {
    	if (Friend::isFriend(auth()->id(), $id))
    	{
    		auth()->user()->removeFriend($id);
    		User::find($id)->removeFriend(auth()->id());
    	}
    	return redirect(User::find($id)->name);
    }
}
