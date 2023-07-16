
<?php 
if(isset($_GET['id']) ) {
include("connection.php");
$id = $_GET['id'];

$query = "SELECT * FROM patient_form where patient_id= '$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
}

?>

<?php error_reporting(0); ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link rel="stylesheet" href="patient-data.css">
</head>

<body>
<a href="staffpage.php">                    
<button class="plus-button">x</button>
</a>  
 
    <div class="container">
        <form action="" method="POST">
        <div class="title">
            update patient detials
        </div>
        
        <div class="form">
            <div class="input-field">
                <label>Patient ID</label>
                <input type="text" value="<?php echo $result['patient_id']; ?>" class="input" name="patient_id" required>
            </div>
            <div class="input-field">
                <label>Patient Name</label>
                <input type="text" value="<?php echo $result['patient_name']; ?>" class="input" name="patient_name" required>
            </div>
            <div class="input-field">
                <label>Age</label>
                <input type="text" value="<?php echo $result['age']; ?>" class="input" name="age" required>
            </div>
            <div class="input-field">
                <label>Gender</label>
                <div class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>

                    <option value="male"
                    <?php
                    if($result['gender'] == 'male')
                    {
                        echo "selected";
                    }
                    ?>
                    >
                        Male</option>
                    <option value="female"
                    <?php
                    if($result['gender'] == 'female')
                    {
                        echo "selected";
                    }
                    ?>
                    >
                    Female</option>
                </select>
            </div>
            </div>
            <div class="input-field">
                <label>Study Description</label>
                <textarea class="textarea" name="study_description" required><?php echo $result['study_description']; ?></textarea>
            </div>
            <div class="input-field">
                <label>Contact No</label>
                <input type="text" value="<?php echo $result['contact_no']; ?>" class="input" name="contact_no" required>
            </div>
            <div class="input-field">
                <label>Referral Doctor</label>
                <input type="text" value="<?php echo $result['referral_doctor']; ?>" class="input" name="referral_doctor" required>
            </div>
            <div class="input-field">
                <input type="submit" value="Update Details" class="btn" name="update">
            </div>
          
 
</div>
        </div>
    </div>
</form>
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
if($_POST['update'])
{
   $pid   = $_POST['patient_id'];
   $pname = $_POST['patient_name'];
   $age   = $_POST['age'];
   $gen   = $_POST['gender'];
   $sdesc = $_POST['study_description'];
   $cno   = $_POST['contact_no'];
   $rdoc  = $_POST['referral_doctor'];
   

   $query = "UPDATE patient_form set patient_id='$pid',patient_name='$pname',age='$age',gender='$gen',study_description='$sdesc',contact_no='$cno',referral_doctor='$rdoc' WHERE patient_id='$id'";
   $data = mysqli_query($conn,$query);
   if($data)
   {
    echo "<script>alert('Details Updated')</script>";
    ?>
    <meta http-equiv= "refresh" content = "0; url = http://localhost:3000/staffpage/staffpage.php" /> 
    <?php
   }
   else
   {
    echo "Failed to Update";
   }
}
?> 



