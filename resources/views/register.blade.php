@extends('head')
@section('content') 
@include('nav')
<div class="container reg_form_out" style="width: 56%">
    <article class="card-body mx-auto">
        <h1>Register Here</h1>
        <hr>
        <form method="POST" onsubmit="return val()">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
                <span id="name_span"></span>
            </div>
            <div class="form-group">
                <label>Mobile:</label>
                <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number" required
                    maxlength="10">
                <span id="mobile_span"></span>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
                <span id="email_span"></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required>
                <span id="password_span"></span>
            </div>
            <div class="form-group">
                <label>Re-enter Password</label>
                <input type="password" class="form-control" id="repassword" placeholder="Re-enter Password"
                    required>
                <span id="repassword_span"></span>
            </div>
            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </article>
</div>
@endsection