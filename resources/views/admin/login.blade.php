<head>
  <title>Study Sekeers</title>
  <link rel="icon" href="{{asset('storage/images/notebook.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"
    integrity="sha256-HtCCUh9Hkh//8U1OwcbD8epVEUdBvuI8wj1KtqMhNkI=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/study_style.css')}}">
  <script type="text/javascript" src="{{asset('js/study_js.js')}}"></script>
</head> 
<body style="background-color: #ffc107">
<div class="container">
	<div class="jumbotron log">
	@if(session('inva'))
		{{ session("inva") }}
	@endif
	<form method="post" action="/admin/logn">
		@csrf
		<div class="form-group">
		    <input type="text" name="user" class="form-control" placeholder="Enter User Name">
		 </div>
		@if($errors->has('user'))
			<span>Enter user name</span>
		@endif
		<br>
		<div class="form-group">
		    <input type="password" name="pass" class="form-control" placeholder="Enter Password">
		 </div>
		@if($errors->has('pass'))
			<span>Enter password</span>
		@endif<br>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</div>
</div>
</body>