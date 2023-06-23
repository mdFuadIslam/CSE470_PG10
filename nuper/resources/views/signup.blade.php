<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <form method='POST' action='newUser'>
        @csrf
        <label for="name">username:</label>
        <input type="text" id="username" name="username"><br>
        <label for="mail">e-mail:</label>
        <input type="text" id="email" name="email"><br>
        <label for="password">password:</label>
        <input type="text" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>