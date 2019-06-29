@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
<div class="heading">
	Edit blog:
</div>
<br>
<div class="jumbotron">
	<form action="blog/update/{{$blog->id}}" method="POST">
		@csrf
		<div class="form-group">
		    <input type="text" value="{{ $blog->title }}" name="title" class="form-control" placeholder="Enter Title">
		 </div>
		@if($errors->has('title'))
			<span>Enter the title of the blog</span>
		@endif<br>
		<br><br>
		<textarea name="content" id="cont_blog">{{ $blog->content }}</textarea>
		@if($errors->has('content'))
			<span>Enter the Content of the blog</span>
		@endif <br>
		<input type="file" name="blog_img"><br><br>
		<button class="btn btn-primary">Submit</button>
	</form>
</div>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'cont_blog' );
</script>
@endsection