@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
	<div class="heading">
		Feed Backs:
	</div>
	<div class="jumbotron">
		@if(isset($feeds))
			@foreach($feeds as $feed)
				<h4>{{ $feed->conten }}</h4><br>
				<h5>By:&nbsp{{ $feed->email }}</h5>
				<h5>At:&nbsp{{ $feed->created_at }}</h5><hr>
			@endforeach
		@endif
	</div>
</div>
@endsection