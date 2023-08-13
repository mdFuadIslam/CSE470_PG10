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
                    <div class='loginBox'>
                    <?php
                        $total=0;
                    ?>
                    <table border=1>
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
                            <th> {{$price=$item->price}} </th>
                            <?php 
                                $duration=$item->duration;
                                if ($duration==NULL){  
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
                            <th> {{$quantity=$item->quantity}} </th>
                        </tr>
                        <?php
                            $total=$total+($quantity*$price);
                        ?>
                        @endforeach
                    </table>
                </div><div class="rightButton">
                    <ul>Sub-Total: {{$total}}</ul>
                    <ul><form method='post' action='payment'>
                        @csrf
                        <input type="hidden" name="total" id="total" value='{{$total}}'>
                        <input type="submit" name="pay" id="pay" value="pay with bkash">
                        <input type="submit" name="pay" id="pay" value="pay in installment">
                    </form></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection