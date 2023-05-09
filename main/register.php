<?php

@include 'config.php';
if(isset($_POST['submit']));{

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5($_POST['password']);
$cpass= md5 ($_POST['name']);

$select="SELECT * FROM user_form WHERE email = '$email' && password = '' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows())

};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action=""method="post">
            <h3>Register now</h3>
            <input type="text" name="name" required placeholder="Enter your name" >
            <input type="email" name="email" required placeholder="Enter your email" >
            <input type="password" name="password" required placeholder="Enter your password" >
            <input type="password" name="cpassword" required placeholder="Confirm your password" >
        <select name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>already have an account ? <a href="login_form.php">Login now</a></p>
        </form>
    </div>
</body>
</html>