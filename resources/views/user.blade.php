@extends('layouts.app')

@section('head')
<title>{{ $user->name }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ $user->name }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                TODO
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
