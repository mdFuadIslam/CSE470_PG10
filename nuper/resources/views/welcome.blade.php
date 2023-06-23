<?php
session_start();
$_SESSION['page']='index.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php if (empty($_SESSION['username'])){ #figure how to switch between user name and sign in/up options
        echo "
        <a href='signup'>Sign Up</a>
        <a href='login'>Login</a>";
    }
    else{
        $name=$_SESSION['username'];
        echo $name;
        echo "
        <a href='logout'>log out</a>";
    }
    ?>
    <br>
    <h4>Show Products Available Here</h4>
</body>
</html>