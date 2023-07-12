<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sell Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                {{$username=Auth::user()->name;}}
                <form method='POST' action='createSale'>
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"><br>
                    <label for="description">description:</label>
                    <input type="text" id="description" name="description"><br>
                    <label for="picture">Picture:</label>
                    <input type="text" id="img" name="img"><br>
                    <label for="Price">Price:</label>
                    <input type="text" id="price" name="price"><br>
                    <label for="picture">Picture 2:</label>
                    <input type="text" id="img2" name="img2"><br>
                    <label for="picture">Picture 3:</label>
                    <input type="text" id="img3" name="img3"><br>
                    <label for="picture">Picture 4:</label>
                    <input type="text" id="img4" name="img4"><br>
                    <label for="picture">Picture 5:</label>
                    <input type="text" id="img5" name="img5"><br>
                    <input type="hidden" id="username" name="username" value='{{$username}}'>
                    <input type="submit" value="Submit">
                </form>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>