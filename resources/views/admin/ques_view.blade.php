@extends('admin.head')
@section('content')  
@include('admin.nav')
<div class="container">
<div class="heading"> 
	Questions:
</div>
<div class="jumbotron">
@if(isset($quests))
@if(count($quests)>0)
@foreach($quests as $quest)
	<b><h2>Question:&nbsp{{ $quest->ques }}</h2></b>
	<p class="conte">
	<b>1:&nbsp</b>{{ $quest->op1 }}<br>
	<b>2:&nbsp</b>{{ $quest->op2 }}<br>
	<b>3:&nbsp</b>{{ $quest->op3 }}<br>
	<b>4:&nbsp</b>{{ $quest->op4 }}<br>
	<b>Correct Answer:&nbsp</b>{{ $quest->co_op }}<br></p>
	<a href="/admin/test/ques/del/{{ $quest->id }}"><button class="btn btn-danger">Delete</button></a>
	<hr>
@endforeach
@else
<h2>No question yet</h2>
@endif
@endif
</div>
</div>
@endsection