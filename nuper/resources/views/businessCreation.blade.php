<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set-up Business</title>
</head>
<body>  
    <form method='POST' action='createBusiness'>
        @csrf
        <label for="name">Business Name:</label>
        <input type="text" id="businessname" name="businessname"><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br>
        <label for="picture">Picture:</label>
        <input type="file" id="img" name="img"><br>
        <label for="file">file:</label>
        <input type="file" id="file" name="file"><br>
        <input type="hidden" id="username" name="username" value='{{$username}}'>
        <input type="submit" value="Submit">
    </form>
</body>
</html>