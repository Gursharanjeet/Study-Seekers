@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
<div class="jumbotron">
@if(isset($blog))
	<h1>{{ $blog->title }}</h1>
	@if($blog->im_path!=NULL)
		<img src="/storage/blog_images/{{ $blog->im_path }}" style="border-radius: 25px;" width="200px" height="200px">
	@endif
	<p>{!! $blog->content !!}</p>
	<small>Created At:{{ $blog->created_at }}</small><br>
	<small>Updated At:{{ $blog->updated_at }}</small>
@endif
</div>
</div>
@endsection