<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Requests') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="createRequest" method="post">
                        @csrf
                        <div class="loginBox">Request title:
                        <input type="text" name="requestName" id="requestName" placeholder="Enter Request name">
                        </div>
                        <div class="loginBox">
                        Request Content:
                        <textarea name="requestContent" rows="10" cols="100"></textarea>
                        </div>
                        <div class="loginBox">Price:
                        <input type="text" name="price" id="price" placeholder="Enter price">
                        </div>
                        <div class="loginBox"> 
                        <input type="submit" name="post" value="post" class="read_more">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>