<?php
@include 'config.php';
session_start();
if(!isset( $_SESSION['admin_name'])){
    header('location:login_form.php');
    exit; // add this line to stop executing the rest of the code
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <form action="" method="post">
      <h3>Register Now</h3><span><?php  echo $_SESSION['admin_name'] ?></span>
      
    </form>
  </div>
</body>
</html>
