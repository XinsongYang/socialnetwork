<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $this->validate(request(), [
            'comment' => 'required|max:100'
        ]);
        
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $id,
            'body' => request('comment')
        ]);
        return back(); 
    }
}
