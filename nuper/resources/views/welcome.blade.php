@extends('layouts.master')
@section('project')
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="text-bg">
                     <h1> <span class="blodark"> Nuper </span></h1> <br>
                     use code: "bazinga" for 10% on all sale!
                     <p>Get you dream setup for cheap!!! </p>
                     <a class="read_more" href="products">Shop now</a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="ban_img"> 
                     <figure><img src="images/ban_img.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- six_box section -->
      <div class="six_box">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><a href='#'><a href='#'><img src="images/gpu.png" alt="#"/></a></a></i>
                     <span>GPU</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><a href='#'><img src="images/cpu.png" alt="#"/></a></i>
                     <span>CPU</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><a href='#'><img src="images/monitor.png" alt="#"/></a></i>
                     <span>Monitor</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><a href='#'><img src="images/km.png" alt="#"/></a></i>
                     <span>Keyboard & Mouse</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><a href='#'><img src="images/headphones.png" alt="#"/></a></i>
                     <span>Headphones</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><a href='#'><img src="images/package.png" alt="#"/></a></i>
                     <span>Packages</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end six_box section -->
      <!-- project section -->
      @include('featureProducts')
      <!-- end project section -->
      <!-- fashion section -->
      @include('featureAuction')
      <!-- end fashion section -->
      <!-- news section -->
@endsection