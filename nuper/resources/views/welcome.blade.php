<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
    if (empty($username)){
    ?>
    <a href='signup'>Sign Up</a>
    <a href='login'>Login</a>
    <br>
    <?php
    }
    else{
       echo "Welcome,'$username'<br>";
       echo "<a href='$username/viewProfile'>View Profile</a>  ";
       echo "<a href='$username/businessCreation'>Create a Businesss</a>  ";
       echo "<a href='$username/logout'>log Out</a>  ";
    }
    ?>
    <h4>Show Products Available Here</h4>
</body>
</html>