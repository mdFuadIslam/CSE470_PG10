@extends('layouts.master')
@section('project')
<div id="project" class="project">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Cart</h2>
             </div>
          </div>
       </div>
</div>    
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class='loginBox'><table border=1>
                        <tr>
                            <th> Username </th>
                            <th> Product Name </th>
                            <th> Price </th>
                            <th> Duration </th>
                            <th> Type </th>
                            <th> Quantity </th>
                        </tr>
                        @foreach($data as $item)
                        <tr>
                            <th> {{$item->username}} </th>
                            <th> {{$item->name}} </th>
                            <th> {{$item->price}} </th>
                            <?php 
                                $duration=$item->duration;
                                if ($duration=='00:00:00'){  
                                    echo "<th>Permanent</th>";
                                }
                                else{
                                    echo "<th>$duration</th>";
                                }
                            ?>
                            <?php 
                                $type=$item->type;
                                if ($type==0){  
                                    echo "<th>Buying</th>";
                                }
                                else{
                                    echo "<th>Renting</th>";
                                }
                            ?>
                            <th> {{$item->quantity}} </th>
                        </tr>
                        @endforeach
                    </table></div>
                    <ul>Pay with bkash<ul>
                    <ul>Pay in installments<ul>
                    <ul>trade items<ul>
                    <ul>book items<ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection