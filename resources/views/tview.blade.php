@extends('head')
@section('content')  
@include('nav')
@if(isset($ques))
	@if(count($ques)>0)
	<div class="container">
		@if(isset($test_title))
			<h1><b>Title:&nbsp</b>{{ $test_title->name }}</h1>
		@endif
		<h3>Questions</h3>
		@foreach($ques as $que)
			<div class="ques">
				<b>Question:&nbsp</b>{{ $que->ques }}<br>
				<b>Option 1:&nbsp</b>{{ $que->op1 }}<br>
				<b>Option 2:&nbsp</b>{{ $que->op2 }}<br>
				<b>Option 3:&nbsp</b>{{ $que->op3 }}<br>
				<b>Option 4:&nbsp</b>{{ $que->op4 }}
				<br>
				<button type="button" id="answer" class="btn btn-primary" onclick="showans()">Answer</button>
				<button type="button" id="close" class="btn btn-danger" onclick="hideans()" style="display: none;">Close</button>
				<div class="ans" id="ans">
					<b>Correct Answer:&nbsp</b>{{ $que->co_op }}
				</div><hr>
			</div>
		@endforeach
		{{ $ques->links() }}
	</div>
	@else
		<h2>No Question availabel</h2>
	@endif
@endif
@endsection