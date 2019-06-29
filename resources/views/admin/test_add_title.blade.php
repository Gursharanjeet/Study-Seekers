@extends('admin.head')
@section('content')  
@include('admin.nav')

<div class="container">
	<div class="heading">Add title:</div>
	<div class="jumbotron">
	<form action="/admin/test/title/add" method="post">
		@csrf
		<div class="form-group">
		    <input type="text" name="title" class="form-control" placeholder="Enter Title">
		 </div>
		@if($errors->has('title'))
			<span>Enter Tilte please</span>
		@endif<br>
		<button class="btn btn-primary">Submit</button>
	</form>
	</div>
</div>
@endsection