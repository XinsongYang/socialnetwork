<ul class="posts">
	@foreach ($posts as $post)
	<li>
	    @include ('posts.post')
	</li>
	@endforeach
</ul>

