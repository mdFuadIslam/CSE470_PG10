<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method='POST' action='login'>
        @csrf
        <label for="name">Username:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>