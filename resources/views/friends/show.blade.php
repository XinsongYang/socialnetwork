@extends ('layouts.app')

@section('head')
<title>My friends</title>
@endsection

@section('content')
<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul class="users">
            	@foreach ($friends as $friend)
            		<?php $user = App\User::find($friend->friend_id); ?>
					<li>
						<a href="{{ url($user->name) }}">
							<img src="{{ Storage::url($user->profile->avatar) }}" alt="{{ $user->name }}" class="post-avatar-image">
						</a>
						<a href="{{ url($user->name) }}">{{ $user->name }}</a>
					</li>
            	@endforeach
            </ul>
        </div>
@endsection