@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
<div class="heading">
	Test<br>
	<a href="test/add_title"><button class="btn btn-secondary">Add Title</button></a>

</div>
<br>
<div class="blog">
	@if(isset($test_title))
	@if(count($test_title)>0)
	@foreach($test_title as $title)
		<a href="test/view/{{ $title->id }}" style="color: black"><h1>Title:{{ $title->name }}</h1></a>
		<a href="test/add/{{ $title->id}}"><button class="btn btn-primary">Add Questions</button></a>
		<br><hr><br>
	@endforeach
	@endif
	@endif
</div>
</div>
@endsection