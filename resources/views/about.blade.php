@extends('head')
@section('content')  
@include('nav')
<div class="container">
	<div class="jumbotron">
      <h1>About US</h1>
      <h5>
      <p> StudySeekers is a free online education courses platform with top notch course material.It offers free online education classes on a wide variety of technology topics. The site highlights series of lectures, videos and notes in the form of pdf files, all in easy to browse categories. The study material at StudySeekers is well written by professionals and is easy to follow.<br> 
      StudySeekers also provide an online MCQ practice test feature where you can test your skills. The test series are populated with tons of questions with answers and description on various topics and is updated regularly.<br>
      Daily blogs are also being posted to acquaint readers with the latest technology and researches.This makes the site extremely useful in formal education settings, as well as in entertaining ways to brush up on new discoveries and topics.
      </p></h5>
   	</div>
   	<div class="about_tag">
	<h1>Our Team</h1>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-3 mar">
		    <div class="card border-0 shadow">
		    	<img src="{{ asset('/storage/images/team1.jpg') }}" height="270px" class="card-img-top" alt="...">
		        <div class="card-body text-center">
		          <h5 class="card-title mb-0">Gursharanjeet Singh</h5>
		         	<div class="card-text text-black-50">Specialization: Python,Jquery <br><br>
		         		<i class="fa fa-google" aria-hidden="true">&nbsp&nbspgursharnajeet981@gmail.com</i></div>
		        </div>
		    </div>
		</div>
		<div class="col-xl-3 col-md-6 mb-3 mar">
		    <div class="card border-0 shadow">
		    	<img src="{{ asset('/storage/images/team2.jpg') }}" height="270px" class="card-img-top" alt="...">
		        <div class="card-body text-center">
		          <h5 class="card-title mb-0">Nitya Bhola</h5>
		         	<div class="card-text text-black-50">Specialization: C++, DBMS<br><br><i class="fa fa-google" aria-hidden="true">&nbsp&nbspnityabhola9@gmail.com</i></div>
		        </div>
		    </div>
		</div>
		<div class="col-xl-3 col-md-6 mb-3 mar">
		    <div class="card border-0 shadow">
		    	<img src="{{ asset('/storage/images/team3.jpg') }}" height="270px" class="card-img-top" alt="...">
		        <div class="card-body text-center">
		          <h5 class="card-title mb-0">Amit Barwal</h5>
		         	<div class="card-text text-black-50">Specialization:OS,Maths<br><br><i class="fa fa-google" aria-hidden="true">&nbsp&nbsptamit700@gmail.com</i></div>
		        </div>
		    </div>
		</div>
	</div>
	</div>
</div>
@endsection