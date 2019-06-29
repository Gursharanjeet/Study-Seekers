@extends('head')
@section('content')  
@include('nav')
<div class="container" style="height:60%; align-self:center;"> 
  <div class="log_form_out">
    <h1>Login Here</h1>
    <hr>
    <form class="form-signin">
      <div class="form-label-group">
        <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      </div>      
      <div class="form-label-group">
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      </div>      
      <div class="custom-control custom-checkbox mb-3">
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1">Remember password</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
    </form>
    <a href="tech/login.html"><h6>Teacher Login</h6></a>
  </div>
</div>
@endsection