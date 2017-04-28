<div class="panel panel-default">
    <div class="panel-heading">Profile</div>

    <div class="panel-body">
        <div class="profile-avatar">
        	<img src="{{ Storage::url($profile->avatar) }}" alt="{{ $user->name }}" class="profile-avatar-image">
        </div>
        <h2>{{ $user->name }}</h2>
        <p>{{ $profile->bio }}</p>
    </div>
</div>