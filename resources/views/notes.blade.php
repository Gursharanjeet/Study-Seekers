@extends('head')
@section('content')  
@include('nav')
<div class="container">
	<h1>Titles:</h1>
	@if(isset($notestitle))
		@if(count($notestitle)>0)
			@foreach($notestitle as $notetitle)
			<a href="/notes/view/{{ $notetitle->id }}"><p class="ncontent">{{ $notetitle->name }}</p></a>
			@endforeach
		@endif
	@endif
</div>
@endsection