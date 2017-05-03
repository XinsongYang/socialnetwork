<?php
$profile = $user->profile;
$posts = $user->posts;
if (Auth::check() and Auth::user()->id == $user->id)
{
	$posts = $posts->reverse();
}
else if (Auth::check() and App\Friend::isFriend(Auth::user()->id, $user->id))
{
	$posts = $posts->where('privacy', 'public')->merge($posts->where('privacy', 'friends'))->reverse();
}
else
{
	$posts = $posts->where('privacy', 'public')->reverse();
}
?>

@extends ('layouts.main')

@section ('head')
<title>{{ $user->name }}</title>
@endsection
@section ('left')

@include ('profiles.profile')
@endsection

@section ('right')
@include ('posts.posts')
@endsection

