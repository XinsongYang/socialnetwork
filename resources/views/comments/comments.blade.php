<?php
$comments = $post->comments->reverse();
?>
<ul class="comments">
	@foreach ($comments as $comment)
	<li>
	    @include ('comments.comment')
	</li>
	@endforeach
</ul>