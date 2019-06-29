@extends('head')
@section('content')  
@include('nav')
<div class="container">
	<h1>Practice:</h1>
	@if(isset($prac))
		@if(count($prac)>0)
			@foreach($prac as $pra)
			<a href="/test/view/{{ $pra->id }}"><p class="ncontent">{{ $pra->name }}</p></a>
			@endforeach
		@endif
	@endif
</div>
@endsection