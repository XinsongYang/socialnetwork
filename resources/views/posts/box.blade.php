<div class="send-post-box">
	<form role="form" enctype="multipart/form-data" method="POST" action="/posts">
		{{ csrf_field() }}
		
		<div class="form-group">
			<input type="text" class="form-control" id="title" name="title" placeholder="Title" required maxlength="40">
		</div>
		
		<div class="form-group">
			<textarea id="body" name="body" class="form-control" placeholder="What's happening?" required maxlength="200"></textarea>
		</div>
		
		<div class="form-group row">
			<div class="input-file col-md-3">
				<label for="imageFiles" class="btn btn-default">
					Add Images
				</label>
				<input type="file" accept="image/gif,image/jpeg,image/jpg,image/png" id="imageFiles" name="imageFiles[]" multiple onchange="display(this);">
			</div>
			<div class="input-file col-md-3">
				<label for="videoFile" class="btn btn-default">
					Add Video
				</label>
				<input type="file" accept="video/mp4" id="videoFile" name="videoFile" >	
			</div>
			<div class="col-md-3">
				    <select name="privacy" class="form-control">
				      <option value="public">public</option>
				      <option value="friends">friends</option>
				      <option value="self">self</option>
				    </select>
			</div>
			<div class="col-md-3">
				    <input type="text" name="location" placeholder="Location">
			</div>			
		</div>

		<div id="mediaBox">	</div>

		<button type="submit" class="btn btn-default btn-primary pull-right">Post</button>
		<div class="clear"></div> 
		@include ('layouts.errors')
	</form>

	<script type="text/javascript">
		function display(input) {
			$("#mediaBox").empty();
		    for (var i = 0; i < input.files.length; i++) {
		                var reader = new FileReader();
		                reader.onload = function (e) {
		                    $('#mediaBox').append(
		                    	$('<img/>)')
		                        .attr('src', e.target.result)
		                        .addClass("upload")
		                        .addClass("img-thumbnail")
		                        );
		                };
		                reader.readAsDataURL(input.files[i]);
		            }
		}
	</script>
</div>