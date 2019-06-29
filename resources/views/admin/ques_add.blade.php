@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
	<div class="jumbotron">
	<form method="post" action="submit" enctype="multipart/form-data">
		@csrf
		@if(isset($id))
			<input type="title" name="title" value="{{ $id }}" style="display: none;">
		@endif<br>
		<div class="form-group">
		    <input type="text" name="ques" class="form-control" placeholder="Enter Question">
		 </div>
		@if($errors->has('ques'))
			<span>Please Enter question</span>
		@endif<br>
		<div class="form-group">
		    <input type="text" name="op1" class="form-control" placeholder="Enter Option 1">
		 </div>
		@if($errors->has('op1'))
			<span>Please Enter Option 1</span>
		@endif<br>
		<div class="form-group">
		    <input type="text" name="op2" class="form-control" placeholder="Enter Option 2">
		 </div>
		@if($errors->has('op2'))
			<span>Please Enter Option 2</span>
		@endif<br>
		<div class="form-group">
		    <input type="text" name="op3" class="form-control" placeholder="Enter Option 3">
		 </div>
		@if($errors->has('op3'))
			<span>Please Enter Option 3</span>
		@endif<br>
		<div class="form-group">
		    <input type="text" name="op4" class="form-control" placeholder="Enter Option 4">
		 </div>
		@if($errors->has('op4'))
			<span>Please Enter Option 4</span>
		@endif<br>
		<div class="form-group">
		    <input type="text" name="co_op" class="form-control" placeholder="Enter Correct Answer">
		 </div>
		@if($errors->has('co_op'))
			<span>Please Enter Correct Option</span>
		@endif<br>
		<button class="btn btn-primary">Submit</button>
	</form>
</div>
</div>
@endsection