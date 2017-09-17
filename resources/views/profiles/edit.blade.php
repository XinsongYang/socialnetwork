@extends('layouts.app')

@section('head')
<title>Edit my profile</title>
@endsection

@section('content')
<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<h2> {{ $user->name }} 's Profile</h2>
		<form enctype="multipart/form-data" role="form" method="POST" action="/profile/edit">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="avatar">Avatar</label>
				<div class="profile-avatar">
					<img src="{{ Storage::disk('s3')->url($profile->avatar) }}" alt="{{ $user->name }}" id="avatarImg" class="profile-avatar-image" >
				</div>
				<input type="file" id="avatar" name="avatar" onchange="display(this);">
			</div>
			<div class="form-group">
				<label for="bio">Bio</label>
				<textarea id="bio" class="form-control" rows="3" name="bio" >{{ $profile->bio }}</textarea>
			</div>
			<div class="form-group">
				<label for="location">Location</label>
				<input id="location" type="text" class="form-control" name="location" value="{{ $profile->location }}" ></input>
			</div>
			<div class="form-group">
				<label for="job">Job</label>
				<input id="job" type="text" class="form-control" name="job" value="{{ $profile->job }}" ></input>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			@include ('layouts.errors')
		</form>
	</div>
</div>
@endsection

<script type="text/javascript">
	function display(input) {
        if (input.files && input.files[0])
        {
        	var reader = new FileReader();
        	reader.onload = function (e) {
        	    $('#avatarImg').attr('src', e.target.result);
        	};
        	reader.readAsDataURL(input.files[0]);
        }   
	}
</script>