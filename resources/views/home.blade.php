<?php
$user = Auth::user();
$profile = $user->profile;
$posts = $user->posts;
$friends =$user->friends;
foreach ($friends as $friend) {
	$friendPosts = App\User::find($friend->friend_id)->posts;
	$posts = $posts->merge($friendPosts->where('privacy', 'public'))->merge($friendPosts->where('privacy', 'friends'));
}
$posts = $posts->sortByDesc('created_at');

?>

@extends('layouts.main')

@section('head')
<title>{{ $user->name . '\'s Home' }}</title>
@endsection

@section ('left')
	@include ('profiles.profile')
@endsection

@section ('right')
    @include ('posts.box')
	@include ('posts.posts')
@endsection
