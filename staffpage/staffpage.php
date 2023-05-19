
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
        <?php
                    include("connection.php");
error_reporting(0);
$query = "SELECT * FROM FORM";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);



//echo $total;

if($total != 0)
{
    ?>
<h2 align="center">Displaying All Records</h2>
<center><table border="3" cellspacing="8" width="75%">
    <tr>
    <th width="10%">Patient ID</th>
    <th width="10%">Patient Name</th>
    <th width="5%">Age</th>
    <th width="5%">Gender</th>
    <th width="25%">Study Description</th>
    <th width="10%">Contact No</th>
    <th width="10%">Referral Doctor</th>
    </tr>



<?php
 
   while($result = mysqli_fetch_assoc($data))
   {
    echo "<tr>
    <td>".$result['patient_id']."</td>
    <td>".$result['patient_name']."</td>
    <td>".$result['age']."</td>
    <td>".$result['gender']."</td>
    <td>".$result['study_description']."</td>
    <td>".$result['contact_no']."</td>
    <td>".$result['referral_doctor']."</td>
    </tr>
     
    ";
   } 
}
else
{
    echo "No records found";
}

?>

    </div>
<script>
    
    let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>

</body>

</table>
</center>
</html>

