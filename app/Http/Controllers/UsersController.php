<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function user($username)
    {        
        $user = User::where('name',$username)->first();
        if ($user == null)
        {
        	return view('404');
        }
        
        return view('user', compact('user'));
    }
}
