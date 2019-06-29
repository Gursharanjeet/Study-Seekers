@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
	<div class="admincontent">
		<span>Total Number of Blogs:</span>
		@if(($total_blog)!=0)
			{{ $total_blog }}
		@else
			0
		@endif
	</div>
	<div class="admincontent">
		<span>Total Number of Notes:</span>
		@if(($total_notes)!=0)
			{{$total_notes}}
		@else
			0
		@endif	
	</div>
	<div class="admincontent">
		<span>Total Number of Test:
		@if(($total_test)!=0)
			{{$total_test}}
		@else
			0
		@endif
		</span>
	</div>
	<div class="admincontent">
		<span>Total Number of Blogs Publish By you:</span>
		@if(($total_blog_publish)!=0)
			{{$total_blog_publish}}
		@else
			0
		@endif
	</div>
</div>
@endsection