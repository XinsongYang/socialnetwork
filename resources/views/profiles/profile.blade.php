<div class="panel panel-default">
    <div class="panel-heading">Profile</div>

    <div class="panel-body">
        <div class="profile-avatar">
        	<img src="{{ Storage::url($profile->avatar) }}" alt="{{ $user->name }}" class="profile-avatar-image">
        </div>
        <h2>{{ $user->name }}</h2>
        <p>{{ $profile->bio }}</p>
        @if (Auth::check() and Auth::user()->id == $user->id)
            <a class="btn btn-default" href="{{ url('/profile/edit') }}" role="button">Edit</a>
        @endif
    </div>
</div>