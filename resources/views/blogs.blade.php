@extends('head')
@section('content')  
@include('nav')
<div class="container">
	<h1>Blogs:</h1>
	@if(isset($blogs))
		@if(count($blogs)>0)
			@foreach($blogs as $blog)
			<a href="/blog/view/{{ $blog->id }}"><p class="ncontent"><i class="fa fa-book" aria-hidden="true">&nbsp</i>{{ $blog->title }}</p></a>
			@endforeach
		@endif
	@endif
</div>
@endsection