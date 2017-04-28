@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 ">
            @yield ('left')
        </div>
        <div class="col-md-8">
            @yield ('right') 
        </div>
    </div>
</div>
@endsection
