@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
	<div class="jumbotron">
	@if(isset($note))
		<h1>{{ $note->topic }}</h1>
		<hr>
		<h2>{!!$note->content !!}</h2><br>
		@if($note->vid!=NULL)
			<video width="320" height="240" controls>
  				<source src="/storage/note_video/{{ $note->vid }}" type="video/mp4">
  				Your browser does not support the video tag.
			</video>
		@endif<br>
		@if($note->vid!=NULL)
			<a href="/storage/note_doc/{{ $note->doc }}" target="_blank"><h4>Pdf Notes</h4></a>
		@endif
	@endif
</div>
</div>
@endsection