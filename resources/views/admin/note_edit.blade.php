@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
	<div class="jumbotron">
	<form method="post" action="update/{{ $note->id }}" enctype="multipart/form-data">
		@csrf
		@if(isset($note))
		<br>
		<div class="form-group">
		    <input type="text" value="{{ $note->topic }}" name="topic" class="form-control" placeholder="Enter Topic">
		 </div>
		<br>
		@if($errors->has('topic'))
			<span>Please Enter Topic</span>
		@endif
		<textarea name="content" id="cont_blog">{{ $note->content }}</textarea><br>
		@if($errors->has('content'))
			<span>Please Enter Content</span><br>
		@endif
		Upload video<input type="file" name="note_video"><br>
		@if(isset($note_video))
			<span>Please upload Video</span>
		@endif
		<br><br>
		Upload Document<input type="file" name="note_doc"><br>
		@if(isset($note_doc))
			<sapn>Please Upload Pdf file</sapn>
		@endif
		@endif<br>
		<button class="btn btn-primary">Submit</button>
	</form>
</div>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'cont_blog' );
</script>
@endsection