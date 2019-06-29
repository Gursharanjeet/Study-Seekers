@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
<div class="jumbotron">
<h2>Add Notes</h2>
	<form method="post" action="submit" enctype="multipart/form-data">
		@csrf
		@if(isset($id))
			<input type="title" name="title" value="{{ $id }}" style="display: none;">
		@endif
		<div class="form-group">
		    <input type="text" name="topic" class="form-control" placeholder="Enter Topic">
		 </div>
		@if($errors->has('topic'))
			<span>Please Enter Topic</span>
		@endif<br>
		<textarea name="content" id="cont_blog"></textarea>
		@if($errors->has('content'))
			<span>Please Enter Content</span><br><br>
		@endif<br>
		Upload video<input type="file" name="note_video">
		@if(isset($note_video))
			<span>Please upload Video</span>
		@endif<br><br>
		Upload Document<input type="file" name="note_doc">
		@if(isset($note_doc))
			<span>Please Upload Pdf file</span>
		@endif<br><br>
		<button class="btn btn-primary">Submit</button>
	</form>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'cont_blog' );
</script>
@endsection