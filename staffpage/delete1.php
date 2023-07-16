<?php
include("connection.php");
error_reporting(0);

if($_GET['patient_id'])
{
    $id = $_GET['patient_id'];

    $sql="DELETE FROM patient_form WHERE patient_id = '$id'";

$result=mysqli_query($conn,$sql);

if($result)
{
    header("Location: staffpage.php");
}
}
?>