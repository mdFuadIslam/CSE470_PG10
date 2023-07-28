@extends('layouts.master')
@section('project')
<div id="project" class="project">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>View Item</h2>
            </div>
         </div>
      </div>
   </div>
   <div class='loginBox'>
      @foreach ($product as $data)
         <div><ul><img  src="{{$data->imgUrl}}" alt="#" width='300' height='300'/></ul></div>
         <h3><ul>Name: {{$data->name}}</ul>
         <ul>Price: {{$data->price}}</ul>
         <ul>Description: {{$data->description}}</ul>
         <ul>Owner: {{$data->username}}</ul>
         <div><ul><img  src="{{$data->imgUrl2}}" alt="#"/></ul></div>
         <div><ul><img  src="{{$data->imgUrl3}}" alt="#"/></ul></div>
         <div><ul><img  src="{{$data->imgUrl4}}" alt="#"/></ul></div>
         <div><ul><img  src="{{$data->imgUrl5}}" alt="#"/></ul></div></h3>
         <form method="post" action="{{ url('/addToCart') }}">
           @csrf
           <input type="hidden" name="pId" id="pId" value="{{$data->rentID}}">
           <input type="hidden" name="username" id="username" value="{{$data->username}}">
           <input type="hidden" name="name" id="name" value="{{$data->name}}">
           <input type="hidden" name="price" id="price" value="{{$data->price}}">
           <input type="hidden" name="type" id="type" value="1">
           <input type="hidden" name="duration" id="duration" value="{{$data->duration}}">
           <input type="submit" name="add to cart" value="add to cart">
         </form>
         <form method="post" action="{{ url('/addToWishlist') }}">
           @csrf
           <input type="hidden" name="pId" id="pId" value="{{$data->rentID}}">
           <input type="hidden" name="username" id="username" value="{{$data->username}}">
           <input type="hidden" name="type" id="type" value="1">
           <input type="submit" name="add to wishlist" value="add to wishlist">
         </form>
      @endforeach
   </div>
</div>
@endsection
