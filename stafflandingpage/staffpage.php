<?php
@include 'config.php';
session_start();
if(!isset( $_SESSION['user_name'])){
    header('location;login_form.php');
}
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navigation Bar with Search Box</title>
    <link rel="stylesheet" href="staffpage.css" />
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
   <script src="staffpage.js" defer></script>
  </head>
  <body>
    <div class="container">
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="#" class="logo">Profile</a>
      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="#">New Patient</a></li>
        <li><a href="#">Patient Record</a></li>
        <li><a href="#">Patient Bill</a></li>
        <li><a href="#">Total Bill</a></li>
        <a href="/scanningcenter/main/login_form.php">Logout</a><span><span><?php echo $_SESSION['user_name'] ?></span>
      </ul>
      <i class="uil uil-search search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Search here..." />
      </div>
      </div>
    </nav>
  </body>
</html>
