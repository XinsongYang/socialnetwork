<div class="profile-box">

    <div class="profile-avatar">
    	<img src="{{ Storage::disk('s3')->url($profile->avatar) }}" alt="{{ $user->name }}" class="profile-avatar-image img-rounded">
    </div>
    <h2>{{ $user->name }}</h2>
    <p>{{ $profile->bio }}</p>
    <p>{{ $profile->location }}</p>
    <p>{{ $profile->job }}</p>
    
    @if (Auth::check() and Auth::user()->id == $user->id)
        <a class="btn btn-primary" href="{{ url('/profile/edit') }}" role="button">Edit</a>
    @elseif (Auth::check() and App\Friend::isFriend(Auth::user()->id, $user->id) )
        <form role="form" enctype="multipart/form-data" method="POST" action={{ '/removefriend/'.$user->id}}>
            {{ csrf_field() }}
            <input type="submit" value="Remove Friend" class="btn btn-primary">
        </form>
    @elseif (Auth::check())
        <form role="form" enctype="multipart/form-data" method="POST" action={{ '/addfriend/'.$user->id}}>
            {{ csrf_field() }}
            <input type="submit" value="Add Friend" class="btn btn-primary">
        </form>
    @endif
    
    @if (Auth::check() and Auth::user()->id == $user->id)
        <div class="info-box flowhidden">
            <a href="/friends" class="btn btn-info col-md-6">Friends({{ $user->friends->count()}})</a>
            <a href={{'/' . $user->name }} class="btn btn-info col-md-6">Posts({{ $user->posts->count()}})</a>
        </div>
    @endif
    
</div>
