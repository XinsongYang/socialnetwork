@extends('layouts.main')

@section('head')
<title>{{ $user->name . '\'s Home' }}</title>
@endsection

@section ('left')
@include ('profiles.profile')
@endsection

@section ('right')
<div class="row">
    TODO
</div>
@include ('posts.posts')
@endsection
