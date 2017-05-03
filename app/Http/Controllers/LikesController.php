<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function click($post_id) 
    {
    	if (Like::isLiked(auth()->id(), $post_id))
    	{
    		Like::where('user_id', auth()->id())
    			->where('post_id', $post_id)
    			->delete();
    	}
    	else
    	{
    		Like::create([
    		    'user_id' => auth()->id(),
    		    'post_id' => $post_id
    		]);
    	}
    	return back();
    }

    public function store($post_id)
    {
    	if (!Like::isLiked(auth()->id(), $post_id))
    	{
    		Like::create([
    		    'user_id' => auth()->id(),
    		    'post_id' => $post_id
    		]);
    	}
        return back(); 
    }

    public function destroy($post_id)
    {
        if (Like::isLiked(auth()->id(), $post_id))
    	{
    		Like::where('user_id', auth()->id())
    			->where('post_id', $post_id)
    			->delete();
    	}
        return back(); 
    }
}
