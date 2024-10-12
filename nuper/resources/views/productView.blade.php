@extends('layouts.master')
@section('project')
<?php
   if (Auth::check()){
   $username=Auth::user()->name;
   }
   else{
      $username="Guest";
   }
?>
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
           <input type="hidden" name="pId" id="pId" value="{{$data->saleId}}">
           <input type="hidden" name="username" id="username" value="{{$username}}">
           <input type="hidden" name="name" id="name" value="{{$data->name}}">
           <input type="hidden" name="price" id="price" value="{{$data->price}}">
           <input type="hidden" name="type" id="type" value="0">
           <input type="submit" name="add to cart" value="add to cart">
         </form>
         <form method="post" action="{{ url('/addToWishlist') }}">
           @csrf
           <input type="hidden" name="pId" id="pId" value="{{$data->saleId}}">
           <input type="hidden" name="username" id="username" value="{{$username}}">
           <input type="hidden" name="type" id="type" value="0">
           <input type="submit" name="add to wishlist" value="add to wishlist">
         </form>
         <form method="post" action="{{ url('/tradeItem') }}">
           @csrf
           <input type='text' name='tImg' id='tImg' placeholder="Image URL">
           <input type='text' name='tName' id='tName' placeholder="Product Name">
           <input type="hidden" name="tUsername" id="tUsername" value="{{$username}}">
           <input type="hidden" name="sID" id="sID" value="{{$data->saleId}}">
           <input type='hidden' name='img' id='img' value="{{$data->imgUrl}}">
           <input type="hidden" name="username" id="username" value="{{$data->username}}">
           <input type="hidden" name="name" id="name" value="{{$data->name}}">
           <input type="submit" name="trade" value="trade">
         </form>
      @endforeach
   </div>
</div>
@endsection
