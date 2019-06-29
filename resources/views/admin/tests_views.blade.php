@extends('admin.head')
@section('content')  
@include('admin.nav')
<div>
	@if(isset($tests))
	@if(count($tests)>0)
	@foreach($tests as $test)
		<div>
			<a href="/admin/test/test_view/{{ $test->id }}">{{ $test->name }}</a>
			<a href="/admin/test/test_ed/{{ $test->id }}"><button>Edit</button></a>
			<a href="/admin/test/tes_del/{{ $test->id }}"><button>Delete</button></a>
		</div><hr>
	@endforeach
	@endif
	@endif
	@if(count($tests)<=0)
	<h3>You have no notes in this title</h3>
	@endif
</div>
@endsection