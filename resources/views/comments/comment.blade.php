<?php
$commentUser = $comment->user;
?>

<div class="comment flowhidden" >
	<div class="pull-left">
		<a href="{{ url($commentUser->name) }}" >
			<img src="{{ Storage::disk('s3')->url($commentUser->profile->avatar) }}" alt="{{ $commentUser->name }}" class="comment-avatar-image">
		</a>
	</div>
	<div class="pull-left">
		<div>
			<a href="{{ url($commentUser->name) }}">{{ $commentUser->name }}</a>
			<span> {{ ': ' . $comment->body }}</span>
		</div>
		<div>
			<span class="time">{{ $post->created_at->timezone('America/Toronto')->format('H:i:s - M j, Y')  }}</span>
		</div>
	</div>	
</div>