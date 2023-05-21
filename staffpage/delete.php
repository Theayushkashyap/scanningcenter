<?php
include("connection.php");

$id = $_GET['id'];
$query = "DELETE FROM FORM WHERE patient_id = '$id'";
$data = mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('Record Deleted')</script>";
    ?>

<meta http-equiv= "refresh" content = "0; url = http://localhost:3000/staffpage/staffpage.php" /> 
    <?php
}
else{
    echo "<script>alert('Failed to Delete')</script>";
}
?>