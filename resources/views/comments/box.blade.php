<div class="comment-box">
	<form role="form" enctype="multipart/form-data" method="POST" action={{ '/comments/' . $post->id}}>
		{{ csrf_field() }}
		<div class="form-group">
			<textarea id="comment" name="comment" class="form-control" placeholder="comment" required></textarea>
		</div>
		<button type="submit" class="btn btn-default btn-primary pull-right">Comment</button>
		<div class="clear"></div> 
		@include ('layouts.errors')
	</form>
</div>