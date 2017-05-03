@extends('layouts.app')

@section('head')
<title>Search</title>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
			    <div class="panel-heading"><h3 class="panel-title">User List</h3></div>
			    <div class="panel-body">
			        @include ('users.list')
			    </div>
			</div>
            
		</div>

		<div class="col-md-8">
			<div class="panel panel-default">
			    <div class="panel-heading"><h3 class="panel-title">Posts Feed</h3></div>
			    <div class="panel-body">
			        @include ('posts.posts')
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection