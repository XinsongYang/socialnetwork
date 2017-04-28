@extends('layouts.app')

@section('head')
<title>{{ Auth::user()->name . '\'s Home' }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ Auth::user()->name }}You are logged in! 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @include ('posts.box')
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    @include ('posts.post')
                @endforeach
            </div>  
        </div>
    </div>
</div>
@endsection
