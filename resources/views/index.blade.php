@extends('head')
@section('content')  
@include('nav')
<div class="slider">
  <div class="image_text">
    <h1>Never Dream About Success Work For it!</h1>
  </div>
</div><br>

<div class="container">
    <div class="jumbotron">
      <h1>Practice</h1>
        @if(isset($tests))
        @if(count($tests)>0)
          @foreach($tests as $test)
            <a href="/test/view/{{ $test->id }}"><p class="content">{{ $test->name }}</p></a>
          @endforeach
          <a href="/prac"><button type="button" class="btn btn-secondary">Show more</button></a>
        @else
          <h2>No Practice test is available yet</h2>
        @endif
        @endif
    </div>
    <div class="jumbotron">
      <h1>Blog</h1>
        @if(isset($blogs))
        @if(count($blogs)>0)
          @foreach($blogs as $blog)
            <a href="/blog/view/{{ $blog->id }}"><p class="content">{{ $blog->title }}</p></a>
          @endforeach
          <a href="/blog"><button type="button" class="btn btn-secondary">Show more</button></a>
        @else
          <h2>No Blog is available yet</h2>
        @endif
        @endif
    </div>
    <div class="jumbotron">
      <h1>Notes</h1>
        @if(isset($notes))
        @if(count($notes)>0)
          @foreach($notes as $note)
            <a href="/notes/view/{{ $note->id }}"><p class="content">{{ $note->name }}</p></a>
          @endforeach
        <a href="/notes"><button type="button" class="btn btn-secondary">Show more</button></a>
        @else
          <h2>No Notes is available yet</h2>
        @endif
        @endif
    </div>
  <section id="contact"><br>
    
    <div class="jumbotron">
      <form method="post" action="feedback">
      @csrf
      <h3>Contact us:</h3>
      <div class="container" style="width:50%">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
          @if($errors->has('email'))
            <span class="error">Enter your email</span>
          @endif
        </div><br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Example textarea</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
          @if($errors->has('content'))
            <span class="error">Enter your Content</span>
          @endif
        </div><br>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
      <h5 style="margin-left: 25%;"><b>Or you can mail us on: </b>&nbspstudy.seekers.official@gmail.com
</h5>
    </div>
  

 </section>
</div>
@endsection