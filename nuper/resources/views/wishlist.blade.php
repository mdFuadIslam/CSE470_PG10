@extends('layouts.master')
@section('project')
<div id="project" class="project">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Wishlist</h2>
             </div>
          </div>
       </div>
</div>    
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class='loginBox'>
                    <table border=1>
                        <tr>
                            <th> Username </th>
                            <th> Product Name </th>
                            <th> Price </th>
                            <th> Duration </th>
                            <th> Type </th>
                        </tr>
                        @foreach($dataone as $item)
                        <tr>
                            <th> {{$item->username}} </th>
                            <th> {{$item->name}} </th>
                            <th> {{$item->price}} </th>
                            <th>Permanent</th>
                            <th>Sale</th>
                        </tr>
                        @endforeach
                    </table>
                    <table border=1>
                        <tr>
                            <th> Username </th>
                            <th> Product Name </th>
                            <th> Price </th>
                            <th> Duration </th>
                            <th> Type </th>
                        </tr>
                        @foreach($datatwo as $item)
                        <tr>
                            <th> {{$item->username}} </th>
                            <th> {{$item->name}} </th>
                            <th> {{$item->price}} </th>
                            <th>{{$item->duration}}</th>
                            <th>Rents</th>
                        </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection