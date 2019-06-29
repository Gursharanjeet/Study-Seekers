@extends('head')
@section('content')  
@include('nav')
<div class="container">
	@if(isset($blog))
		<h1>{{ $blog->title }}</h1>
		<hr>
		@if($blog->im_path!=NULL)
			<img src="/storage/blog_images/{{ $blog->im_path }}" width="200px" height="200px">
		@endif
		<img src="">
		<h5>{!! $blog->content !!}</h5>
		<hr>
		<a href="/about"><small style="color: black;font-size: 1em;">Publish By:&nbsp{{ $blog->publish_by }}<br>
			Publich At:&nbsp{{ $blog->created_at }}</small></a>
	@endif	
</div>
@endsection