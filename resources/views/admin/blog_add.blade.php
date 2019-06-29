@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
<div class="heading">
	Add new blog:
</div>
<br>
<div class="jumbotron">
	<form action="add/blog_submit" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
		    <input type="text" name="title" class="form-control" placeholder="Enter Title">
		 </div>
		@if($errors->has('title'))
			<span>Enter the title of the blog</span>
		@endif
		<br><br>

		<textarea name="content" id="cont_blog"></textarea> 
		@if($errors->has('content'))
			<span>Enter the Content of the blog</span>
		@endif
		<br><br>
		<input type="file" name="blog_img" id="blog_img"><br>
		@if(session('blog_img'))
			Upload Image only	
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