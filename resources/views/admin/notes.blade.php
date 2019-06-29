@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
	<div class="heading">
		Notes:
	</div>

<div>
	<a href="notes/add_title"><button class="btn btn-warning">Add Title</button></a><br>
	<hr>
	@if(isset($notes_title))
	@if(count($notes_title)>0)
	<h2>Titles:</h2>
	@foreach($notes_title as $title)
		<a href="notes/view/{{ $title->id }}"><h1>{{ $title->name }}</h1></a>
		<a href="notes/add/{{ $title->id}}"><button class="btn btn-primary">Add Notes</button></a>
		<br><hr><br>
	@endforeach
	@else
	<h2>Add title first to add notes:</h2>
	@endif
	@endif
</div>
</div>
@endsection