@extends('admin.head')
@section('content')  
@include('admin.nav')
<div>
	<form method="post" action="submit" enctype="multipart/form-data">
		@csrf
		@if(isset($id))
			<input type="title" name="title" value="{{ $id }}" style="display: none;">
		@endif<br>
		<input type="text" name="name" placeholder="Enter Topic here">
		<br>
		@if($errors->has('name'))
			Please Enter Name of test
		@endif
		<button class="submit">click me</button>
	</form>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'cont_blog' );
</script>
@endsection