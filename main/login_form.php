<?php

@include 'config.php';
session_start();
if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $user_type = $_POST['user_type'];

  // Check if the email already exists
  $select = "SELECT * FROM user_form WHERE email = '$email'";
  $result = mysqli_query($conn, $select);
  
  if(mysqli_num_rows($result) > 0){
    
        $row =mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
            
            $_SESSION['admin_name'] = $row['name'];
            header('location:http://localhost:3000/adminend/admin.php ');

        }elseif($row['user_type'] == 'user'){
            
                $_SESSION['user_name'] = $row['name'];
                header('location:http://localhost:3000/staffpage/staffpage.php ');
          }
        }else{
            $error[] = 'incorrect email or password!';
        }
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="/scanningcenter/hospital-website-template/css/bootstrap.min.css">
</head>
<body>
  
 

</body>
</html>