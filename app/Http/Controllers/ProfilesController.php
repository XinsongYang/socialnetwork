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
        $this->validate(request(), [
            'avatar' => 'image',
            'bio' => 'max:100'
        ]);
        if ($request->hasFile('avatar'))
        {
            // $avatar = $request->file('avatar');
            // $path = Image::make($avatar)->resize(300, 300)->storePublicly('public/avatars');
            $path = $request->file('avatar')->storePublicly('public/avatars');
            Auth::user()->profile->avatar = $path;
        }
        Auth::user()->profile->update([
            'bio' => $request->input('bio')
        ]);
        return redirect(Auth::user()->name);
        // PATCH /posts/id
    }
}
