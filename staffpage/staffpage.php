<?php
@include 'config.php';
session_start();
if(!isset( $_SESSION['user_name'])){
    header('location:http://localhost/scanningcenter/main/login_form.php');
}
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sstaffpage.css">
</head>

<body>

<a href="./patient-data.php" >                    
<button class="plus-button">+</button>
</a>

    <div class="hero">
        <nav>
            <img src="../images/Untitled-1.png" class="logo">

            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Archive</a></li>
                <li><a href="#">Daily Report</a></li>
                <li><a href="#">Payment Details</Details></a></li>
            </ul>
            

            <img src="../images/user.png" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../images/user.png" >
                        <h2><span><?php echo $_SESSION['user_name'] ?></span></h2>
                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/profile.png" >
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/setting.png" >
                        <p>Settings & Privacy </p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/help.png" >
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="../index.html" class="sub-menu-link">
                        <img src="../images/logout.png" >
                        <p>Logout</p>
                        <span>></span>
                    </a>
                    
                    
                </div>
            </div>
        
        </nav>
    


    </div>
    
<script>
    
    let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>

</body>

</html>
<?php
                    include("connection.php");
error_reporting(0);
$query = "SELECT * FROM FORM";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);


//echo $total;

if($total != 0)
{
 
   while($a <= 10)
   {
    echo $result[patient_id]." ".$result[patient_name]." ".$result[age]." ".$result[gender]." ".$result[study_description]." ".$result[contact_no]." ".$result[referral_doctor];
   } 
}
else
{
    echo "No records found";
}
?>