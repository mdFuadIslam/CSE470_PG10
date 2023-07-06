<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php $name=Auth::user()->name; ?>
                    <table>
                        <tr>
                            <th> Picture </th>
                            <th> Username </th>
                            <th> Business Name </th>
                            <th> Location </th>
                            <th> Proof </th>
                            <th> Approve </th>
                        </tr>
                        @foreach($data as $user)
                        <tr>
                            <?php $application_id=$user->application_id; ?>
                            <th> <img src="{{$picture=$user->picture}}" alt="#" width="500" height="600"> </th>
                            <th> {{$username=$user->username}} </th>
                            <th> {{$names=$user->name}} </th>
                            <th> {{$address=$user->address}} </th>
                            <th> {{$user->proof}} </th>
                            <th>
                            @if ($name=='Admin')
                            <!--get approval-->
                            <form action="approval" method="post">
                                @csrf
                                <input type="hidden" id="id" name="id" value='{{$application_id}}'>
                                <input type="hidden" id="username" name="username" value="{{$username}}">
                                <input type="hidden" id="names" name="names" value="{{$names}}">
                                <input type="hidden" id="address" name="address" value="{{$address}}">
                                <input type="hidden" id="picture" name="picture" value="{{$picture}}">
                                <input type="hidden" id="status" name="status" value='1'>
                              <input type="submit" id="submit" name="submit" value="Approve">
                            </form>
                            <form action="approval" method="post">
                                @csrf
                                <input type="hidden" id="id" name="id" value='{{$application_id}}'>
                                <input type="hidden" id="status" name="status" value='2'>
                              <input type="submit" id="submit" name="submit" value="Reject">
                            </form>
                                @else
                            <!--show approval-->
                                    <?php $status=$user->status; ?>
                                    @if ($status==0)
                                        <p>PENDING</p>
                                        @else
                                            @if ($status==1)
                                            <p>APPROVED</p>
                                                @else
                                                <p>REJECTED</p>
                                            @endif
                                    @endif
                            @endif
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>