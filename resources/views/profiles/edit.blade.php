@extends('layouts.app')

@section('head')
<title>Edit my profile</title>
@endsection

@section('content')
<div class="container">
	<div class="col-xs-6 col-md-offset-3">
		<h2> {{ $user->name }} 's Profile</h2>
		<form enctype="multipart/form-data" role="form" method="POST" action="/profile/edit">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="avatar">Avatar</label>
				<div class="profile-avatar">
					<img src="{{ Storage::url($profile->avatar) }}" alt="{{ $user->name }}" class="profile-avatar-image">
				</div>
				<input type="file" id="avatar" name="avatar">
			</div>
			<div class="form-group">
				<label for="bio">Bio</label>
				<textarea id="bio" class="form-control" rows="3" name="bio" >{{ $profile->bio }}</textarea>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			@include ('layouts.errors')
		</form>
	</div>
</div>
@endsection