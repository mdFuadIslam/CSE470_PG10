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
                        </tr>
                        @foreach($data as $user)
                        <tr>
                            <th> <img src="{{$picture=$user->picture}}" alt="#" width="500" height="600"> </th>
                            <th> {{$username=$user->username}} </th>
                            <th> {{$names=$user->businessName}} </th>
                            <th> {{$address=$user->location}} </th>
                            <th><form action='bSellItem' method='post'>
                                @csrf
                                <input type='hidden' name='id' id='id' value='$user->bId'>
                                <input type='submit' name='sellItem' value='sellItem'>
                            </form></th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>