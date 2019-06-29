@extends('head')
@section('content')  
@include('nav')
<div class="container">
	<h1>Notes:</h1>
	@if(isset($notes))
		@foreach($notes as $note)
			<a href="/note/view/{{ $note->id }}"><h3 style="color: black;margin: 20px;">{{ $note->topic }}</h3></a>
		@endforeach
	@endif
</div>
@endsection