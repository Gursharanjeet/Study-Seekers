@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
<div class="heading">
	 Blog:<br>
	 <a href="blog/add"><button class="btn btn-secondary">Add new Blog</button></a>
</div>
<br>
<div class="blog">
	@if(isset($blogs))
	@if(count($blogs)>0)
		@foreach($blogs as $blog)
			<div>
				<img src="/storage/blog_images/{{$blog->im_path}}" style="border-radius: 20px;" alt="Golu" width="100px" height="100px">
				<h4><a href="/admin/blog/view/{{ $blog->id }}">Title:{{ $blog->title }}</a></h4>
				<a href="/admin/blog/edit/{{$blog->id}}"><button class="btn btn-warning">edit</button></a>
				<a href="/admin/blog/del/{{$blog->id}}"><button class="btn btn-danger">delete</button></a>
			</div><br><hr>
		@endforeach
	@else
		<h2>No Bloging yet</h2>
	@endif
	@endif
</div>
</div>
@endsection