<?php include("connection.php"); ?>
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
            Registration Form
        </div>
        
        <div class="form">
            <div class="input-field">
                <label>Patient ID</label>
                <input type="text" class="input" name="pid" required>
            </div>
            <div class="input-field">
                <label>Patient Name</label>
                <input type="text" class="input" name="pname" required>
            </div>
            <div class="input-field">
                <label>Age</label>
                <input type="text" class="input" name="age" required>
            </div>
            <div class="input-field">
                <label>Gender</label>
                <div class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            </div>
            <div class="input-field">
                <label>Study Description</label>
                <textarea class="textarea" name="sdescription" required></textarea>
            </div>
            <div class="input-field">
                <label>Contact No</label>
                <input type="text" class="input" name="contactno" required>
            </div>
            <div class="input-field">
                <label>Referral Doctor</label>
                <input type="text" class="input" name="referraldoctor" required>
            </div>
            <div class="input-field">
                <input type="submit" value="Register" class="btn" name="register">
            </div>
        </div>
    </div>
</form>
    </div>
</body>

</html>

<?php
if($_POST['register'])
{
   $pid   = $_POST['pid'];
   $pname = $_POST['pname'];
   $age   = $_POST['age'];
   $gen   = $_POST['gender'];
   $sdesc = $_POST['sdescription'];
   $cno   = $_POST['contactno'];
   $rdoc  = $_POST['referraldoctor'];

   $query = "INSERT INTO scanning.patient_form (patient_id,patient_name,age,gender,study_description,contact_no,referral_doctor) VALUES('$pid','$pname','$age','$gen','$sdesc','$cno','$rdoc')";
   $data = mysqli_query($conn,$query);
   if($data)
   {
    echo "Data  Inserated into Database";
    ?>
    <meta http-equiv= "refresh" content = "0; url = http://localhost:3000/staffpage/staffpage.php" /> 
    <?php
   }
   else
   {
    echo "Failed";
   }
}
?> 