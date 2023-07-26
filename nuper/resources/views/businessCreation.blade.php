<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set-up Business</title>
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    User: {{$username=Auth::user()->name;}}
                    <form method='POST' action='createBusiness'>
                        @csrf
                        <label for="name">Business Name:</label>
                        <input type="text" id="businessname" name="businessname"><br>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address"><br>
                        <label for="picture">Picture URL:</label>
                        <input type="text" id="img" name="img"><br>
                        <label for="file">file:</label>
                        <input type="file" id="file" name="file"><br>
                        <input type="hidden" id="username" name="username" value='{{$username}}'>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</x-app-layout>