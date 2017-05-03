<ul class="users">
	@foreach ($users as $user)
		<li>
			<a href="{{ url($user->name) }}">
				<img src="{{ Storage::url($user->profile->avatar) }}" alt="{{ $user->name }}" class="post-avatar-image">
			</a>
			<a href="{{ url($user->name) }}">{{ $user->name }}</a>
		</li>
	@endforeach
</ul>