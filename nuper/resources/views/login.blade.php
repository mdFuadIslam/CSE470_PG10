@extends('layouts.master')

@section('project')
      <!-- project section -->
      <div id="project" class="project">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                  <div class="loginBox"><h2>Login to Nuper</h2></div>
                  </div>
               </div>
            </div>
         </div>
       
      <div class="loginContainer">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="loginBox"><p><input type="text" name="e-mail" placeholder="e-mail" id="e-mail"></p></div>
                <div class="loginBox"><p><input type="password" name="password" placeholder="password" id="password"></p></div>
                <div class="loginBox"><p><input type="submit" class="read_more" value="Sign In"></p></div>
            </form>
            <div class="loginBox"><p>Not a member? <a href="signup">Sign up now</a></p></div>
      </div>
      </div>
      <!-- end project section -->
@endsection