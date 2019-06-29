@extends('head')
@section('content')  
@include('nav')
<div class="container">
	@if(isset($note))
	<h1>{{ $note->topic }}</h1>
	<p>{!! $note->content !!}</p>
	<hr>
	@if($note->vid!=NULL)
	<h3>Video Related to Notes:</h3>
		<video width="62%" height="40%" controls style="margin-left: 20%;">
  			<source src="/storage/note_video/{{ $note->vid }}" type="video/mp4" controlsList="nodownload">Your browser does not support the video tag.
		</video>
		@endif<br><br><br>
		@if($note->vid!=NULL)
			<a href="/storage/note_doc/{{ $note->doc }}" target="_blank">Pdf Notes</a>
		@endif
		@endif
</div>
@endsection