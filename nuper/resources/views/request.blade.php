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
                    <button class="rightButton" type="button"><a href="createRequest">Create new Request</a></button><br>
                    @foreach($data as $request)
                        <p class="loginBox"><a href="request/{{$request->rID}}">{{$request->requestName}}</a></P>
                        <p class="loginBox">Price: {{$request->price}}</P>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>