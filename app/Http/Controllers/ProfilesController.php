<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;
use Image;

class ProfilesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
    	$user = Auth::user();
        $profile = $user->profile;
    	return view('profiles.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        //dd(request()->all());
        $this->validate(request(), [
            'avatar' => 'image',
            'bio' => 'max:100',
            'location' => 'max:20',
            'job' => 'max:10'
        ]);
        if ($request->hasFile('avatar'))
        {
            // $avatar = $request->file('avatar');
            // $path = Image::make($avatar)->resize(300, 300)->storePublicly('public/avatars');
            $path = $request->file('avatar')->storePublicly('public/avatars', 's3');
            Auth::user()->profile->avatar = $path;
        }
        Auth::user()->profile->update([
            'bio' => $request->input('bio'), 
            'location' => $request->input('location'),
            'job' => $request->input('job')
        ]);
        return redirect('/');
        // PATCH /posts/id
    }
}
