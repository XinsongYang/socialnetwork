<form role="form" method="POST" action="/posts">
	{{ csrf_field() }}
	
	<div class="form-group">
		<input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
	</div>
	
	<div class="form-group">
		<textarea id="body" name="body" class="form-control" placeholder="What's happening?" required></textarea>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-default ">Post</button>
	</div>

	@include ('layouts.errors')
</form>
