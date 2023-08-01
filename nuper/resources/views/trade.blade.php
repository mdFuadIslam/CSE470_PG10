<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php 
                        $name=Auth::user()->name; 
                    ?>
                    <h3>Trade Offers Recieved</h3>
                    <table>
                        <tr>
                            <th> Username </th>
                            <th> Product </th>
                            <th> Image  </th>
                            <th> Username </th>
                            <th> Product </th>
                            <th> Image  </th>
                            <th> Approval </th>
                        </tr>
                        @foreach($data as $trade)
                        <?php
                            $username=$trade->username;
                        ?>
                            @if($name==$username)
                                <tr>
                                    <th> {{$username=$trade->username}} </th>
                                    <th> {{$names=$trade->name}} </th>
                                    <th> <img src="{{$picture=$trade->img}}" alt="#" width="500" height="600"> </th>
                                    <th> {{$username=$trade->tUsername}} </th>
                                    <th> {{$names=$trade->tName}} </th>
                                    <th> <img src="{{$picture=$trade->tImg}}" alt="#" width="500" height="600"> </th>
                                    <?php
                                    $status=$trade->status;
                                    if ($status==1){
                                        echo "<th>Approved</th>";
                                    }
                                    else if ($status==2){
                                        echo "<th>Rejected</th>";
                                    }
                                    else if ($status==0){
                                    ?>
                                    <th>
                                    <form action="tradeApproval" method="post">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value='{{$trade->id}}'>
                                        <input type="hidden" id="status" name="status" value='1'>
                                      <input type="submit" id="submit" name="submit" value="Approve">
                                    </form>
                                    <form action="tradeApproval" method="post">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value='{{$trade->id}}'>
                                        <input type="hidden" id="status" name="status" value='2'>
                                      <input type="submit" id="submit" name="submit" value="Reject">
                                    </form>
                                    </th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <h3>Trade Offers Given</h3>
                    <table>
                        <tr>
                            <th> Username </th>
                            <th> Product </th>
                            <th> Image  </th>
                            <th> Username </th>
                            <th> Product </th>
                            <th> Image  </th>
                            <th> Status  </th>
                        </tr>
                        @foreach($data as $trade)
                        <?php
                            $tUsername=$trade->tUsername;
                        ?>
                            @if($name==$tUsername)
                                <tr>
                                    <th> {{$username=$trade->username}} </th>
                                    <th> {{$names=$trade->name}} </th>
                                    <th> <img src="{{$picture=$trade->img}}" alt="#" width="500" height="600"> </th>
                                    <th> {{$username=$trade->tUsername}} </th>
                                    <th> {{$names=$trade->tName}} </th>
                                    <th> <img src="{{$picture=$trade->tImg}}" alt="#" width="500" height="600"> </th>
                                        <?php
                                        $status=$trade->status;
                                        if($status==0){
                                            echo "<th> Pending</th>";
                                        }
                                        else if($status==1){
                                            echo "<th> Accepted </th> <th> contact '$username'</th>";
                                        }
                                        else if($status==2){
                                            echo "<th> Rejected </th>";
                                        }
                                        ?>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>