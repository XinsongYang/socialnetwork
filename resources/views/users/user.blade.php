@extends ('layouts.main')

@section ('head')
<title>{{ $user->name }}</title>
@endsection

@section ('left')
@include ('users.profile')
@endsection

@section ('right')
<div class="row">
    TODO
</div>
@include ('posts.posts')
@endsection

