<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Video;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // /posts
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // /posts/create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->hasFile('imageFiles'));
        // dd(request()->all());
        // POST /posts
        // $post = new Post;
        // $post->user_id = auth()->id();
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();
        $this->validate(request(), [
            'title' => 'required|max:40',
            'body' => 'required|max:200',
            'privacy' =>'required|max:7',
            'location' => 'max:20',
            'imageFiles' => 'array|max:9',
            'imageFiles.*' => 'image|max:20000',
            'videoFile' => 'mimetypes:video/mp4|max:100000'
        ]);

        // $post = new Post(request(['title', 'body', 'privacy', 'location']));
        // auth()->user()->publish($post);
        $privacy = request('privacy');
        if ($privacy != 'public' and $privacy != 'friends' and $privacy != 'self')
        {
            $privacy = 'privacy';
        }
        $location = request('location');
        if ($location == null)
        {
            $location = '';
        }
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body'),
            'privacy' => $privacy,
            'location' => $location
        ]);

        if ($request->hasFile('imageFiles'))
        {
            foreach ($request->imageFiles as $image)
            {
                $path = $image->storePublicly('public/images', 's3');
                Image::create([
                    'path' => $path,
                    'post_id' => $post->id
                ]);
            }
        }
        if ($request->hasFile('videoFile'))
        {
            $path = $request->file('videoFile')->storePublicly('public/videos', 's3');
            Video::create([
                'path' => $path,
                'post_id' => $post->id
            ]);
        }        
        return redirect('/'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // GET /posts/id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET /posts/id/edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // PATCH /posts/id
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE /posts/id
        $post = Post::find($id);
        //delete comments and likes
        if ($images = $post->images) {
            foreach ($images as $image) {
                $image->delete();
            }
        }
        if ($video = $post->video) {
            $video->delete();
        }
        $post->delete();
        return redirect('/'); 
    }
}
