<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
Use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('index');
        
    }

    public function home()
    {
        if (Auth::guest())
        {
            return view('index');
        }
        
        return view('home');
    }

    public function search(Request $request)
    {
        $keyword = '%' . $request->input('keyword') . '%';
        $users = User::orWhere('name', 'like', $keyword)->get();
        $posts = Post::orWhere('title', 'like', $keyword)->get();
        return view('search', compact('users', 'posts'));
    }
}
