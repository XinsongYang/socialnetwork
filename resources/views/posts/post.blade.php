<?php
$postUser = App\User::find($post->user_id);
?>
<div class="post" post-id={{ $post->id }}>
	<div class="flowhidden">
		<h3 class="post-title pull-left">{{ $post->title }}</h3>	
		@if ($post->user_id == auth()->id())
		<div class="pull-right delete-btn">
			<form role="form" enctype="multipart/form-data" method="POST" action={{ '/posts/'.$post->id}}>
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="delete" class="btn btn-default" >
			</form>	 
		</div>	
		@endif
		<span class="pull-right text-info privacy-span" >{{ '(' . $post->privacy . ')' }}</span>
	</div>
	<div class="clear"></div>	
	<div>
		<a href="{{ url($postUser->name) }}">
			<img src="{{ Storage::disk('s3')->url($postUser->profile->avatar) }}" alt="{{ $postUser->name }}" class="post-avatar-image">
		</a>
		<a href="{{ url($postUser->name) }}">{{ $postUser->name }}</a>
		<span class="time">{{ $post->created_at->timezone('America/Toronto')->format('H:i:s - M j, Y')  }}</span>
		@if ($post->location != '')
			<span>from </span>
			<a href="#"> {{ $post->location }}</a>
		@endif
	</div>
	<p class="post-body">{{ $post->body }}</p>
	<div>
		@foreach ($post->images as $image)
			<a href="{{ Storage::disk('s3')->url($image->path) }}">
				<img src="{{ Storage::disk('s3')->url($image->path) }}"  class="img-thumbnail upload">
			</a>
		@endforeach
	</div>
	@if ($post->video)
		<div>
			<video width="480" controls>
			  <source src={{ Storage::disk('s3')->url($post->video->path) }} type="video/mp4">
			Your browser does not support the video tag.
			</video>
		</div>
	@endif
	<div class="handle flowhidden" class="row">
		<button type="button" class="btn btn-default col-md-6" data-toggle="collapse" data-target={{'#post'.$post->id.'comments' }} >
			comments({{$post->comments->count()}})
		</button>
		<form role="form" enctype="multipart/form-data" method="POST" action={{ '/likes/' . $post->id}}>
			{{ csrf_field() }}
			@if (Auth::guest())
				<button type="submit" class="btn btn-default col-md-6" disabled >likes({{ $post->likes->count() }})</button>
			@elseif (App\Like::isLiked(auth()->id(), $post->id))
				<button type="submit" class="btn btn-default col-md-6 liked" >likes({{ $post->likes->count() }})</button>
			@else
				<button type="submit" class="btn btn-default col-md-6" >likes({{ $post->likes->count() }})</button>
			@endif
		</form>
	</div>
	<div id={{'post'.$post->id.'comments' }} class="collapse">
		@if (Auth::check())
			@include ('comments.box')
		@endif
		@include ('comments.comments')
	</div>
	
	
</div>