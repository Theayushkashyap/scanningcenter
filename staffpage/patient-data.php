<?php include("connection.php"); ?>
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link rel="stylesheet" href="patient-data.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Global styles for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        /* Styles for the container that holds the form */
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Styles for the entire form */
        .form {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }

        /* Styles for each row in the form */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Styles for each input field and label */
        .input-field {
            flex-basis: 48%; /* Each field takes up 48% of the row width */
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        /* Styles for the label within each input field */
        .input-field label {
            margin-bottom: 5px;
        }

        /* Styles for the text input fields */
        .input {
            height: 45px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        /* Styles for the custom select dropdown */
        .custom_select select {
            height: 45px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        /* Styles for the "Register" button */
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
            height: 45px;
            width: 100%;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Styles for the form title */
        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }


      
        /* Additional CSS to make gender and age fields smaller */
        .input-field.small {
            flex-basis: calc(50% - 10px); /* Each small field takes up 50% of the row width with 10px spacing */
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .form-row {
                flex-wrap: wrap; /* For smaller screens, wrap the fields to a new line */
            }

            .input-field {
                flex-basis: 100%; /* Each field takes up 100% of the row width on smaller screens */
            }
        }
    </style>
</head>

<body>
       <div class="container">
        <form action="" method="POST" class="form">
            <div class="title">
                Registration Form
            </div>

            <div class="form-row">
                <div class="input-field">
                    <label for="pid">Patient ID</label>
                    <input type="text" class="input" name="pid" id="pid" required>
                </div>

                <div class="input-field">
                    <label for="pname">Patient Name</label>
                    <input type="text" class="input" name="pname" id="pname" required>
                </div>
            </div>

            <div class="form-row">
                <div class="input-field small">
                    <label for="gender">Gender</label>
                    <div class="custom_select">
                        <select name="gender" id="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="input-field small">
                    <label for="age">Age</label>
                    <input type="text" class="input" name="age" id="age" required>
                </div>
            </div>

            <div class="form-row">
                <div class="input-field">
                    <label for="sdescription">Study Description</label>
                    <div class="custom_select">
                        <select name="sdescription" id="sdescription" required>
                            <option value="">Select scanning</option>
                            <option value="male">Abdominopelvic Scan</option>
                            <option value="female">Abdominopelvic + Scrotal Scan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="input-field">
                    <label for="contactno">Contact No</label>
                    <input type="text" class="input" name="contactno" id="contactno" required>
                </div>

                <div class="input-field">
                    <label for="referraldoctor">Consulting Dr</label>
                    <input type="text" class="input" name="referraldoctor" id="referraldoctor" required>
                </div>
            </div>

            <div class="input-field">
                <input type="submit" value="Register" class="btn" name="register">
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