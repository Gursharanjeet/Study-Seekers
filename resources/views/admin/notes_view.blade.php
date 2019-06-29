@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
	@if(isset($notes))
	@if(count($notes)>0)
	@foreach($notes as $note)
		<div>
			<h2 ><a href="/admin/notes/note_view/{{ $note->id }}" style="color: black;">{{ $note->topic }}</a></h2>
			<a href="/admin/notes/note_ed/{{ $note->id }}"><button class="btn btn-warning">Edit</button></a>
			<a href="/admin/notes/note_del/{{ $note->id }}"><button class="btn btn-danger">Delete</button></a>
		</div><hr>
	@endforeach
	@endif
	@endif
	@if(count($notes)<=0)
	<h3>You have no notes in this title</h3>
	@endif
</div>
@endsection