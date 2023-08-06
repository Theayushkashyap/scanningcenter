<?php include("connection.php"); ?>
<?php error_reporting(0); ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS styles for the form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .form-box {
            border: 1px solid #ddd; /* Border color */
            padding: 20px;
            border-radius: 10px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            height: 45px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Center-align form fields */
        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-label {
            flex-basis: 120px;
        }

        .form-field {
            flex: 1;
        }

        .success-message {
            display: none;
            color: green;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="form-box">
            <h2 class="mb-4">Patient Registration Form</h2>
            <form id="patientForm" method="post" action="process_form.php">
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender" class="form-label">Gender:</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option selected disabled>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" name="age" id="age" class="form-control" placeholder="Age" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone" class="form-label">Phone:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone no" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="consulting_dr" class="form-label">Consulting Dr:</label>
                        <input type="text" name="consulting_dr" id="consulting_dr" class="form-control" placeholder="Consulting Dr." required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="scanning" class="form-label">Scanning:</label>
                        <select name="scanning" id="scanning" class="form-control" required>
                            <option selected disabled>Select scanning</option>
                            <option value="Abdominopelvic Scan">Abdominopelvic Scan</option>
                            <option value="Abdominopelvic + Scrotal Scan">Abdominopelvic + Scrotal Scan</option>
                            <option value="Obstetric Anomaly Scan">Obstetric Anomaly Scan</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="aadhar_no" class="form-label">Aadhar No:</label>
                    <input type="text" name="aadhar_no" id="aadhar_no" class="form-control" placeholder="Aadhar No">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="entry_date" class="form-label">Date:</label>
                        <input type="date" name="entry_date" id="entry_date" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="entry_time" class="form-label">Time:</label>
                        <input type="time" name="entry_time" id="entry_time" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit Now</button>
            </form>
        </div>

        <div class="success-message mt-3" id="successMessage">Patient has been registered successfully!</div>

    </div>

    <script>
    // JavaScript to set the current date and time
    function setDateTime() {
        const now = new Date();
        const dateInput = document.getElementById("entry_date");
        const timeInput = document.getElementById("entry_time");

        // Format date as YYYY-MM-DD
        const formattedDate = now.toISOString().slice(0, 10);
        // Format time as HH:MM
        const formattedTime = now.toTimeString().slice(0, 5);

        dateInput.value = formattedDate;
        timeInput.value = formattedTime;
    }

    // Set current date and time when the page loads
    setDateTime();

    document.getElementById("patientForm").addEventListener("submit", function(event) {
        event.preventDefault();
        setDateTime();
        // You can add code here to submit the form data to the server using AJAX
        // For now, let's show the success message after a short delay

        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data => {
            // Data successfully submitted, show the success message and reset the form
            showSuccessMessage();
            form.reset();
            setTimeout(hideSuccessMessage, 3000);
        })
        .catch(error => {
            // Error while submitting data, show an error message
            console.error('Error:', error);
            showError("Error while submitting the form. Please try again later.");
        });
    });

    function showSuccessMessage() {
        const successMessage = document.getElementById("successMessage");
        successMessage.style.display = "block";
    }

    function hideSuccessMessage() {
        const successMessage = document.getElementById("successMessage");
        successMessage.style.display = "none";
    }

    function showError(message) {
        const errorElement = document.getElementById("errorMessage");
        errorElement.textContent = message;
        errorElement.style.display = "block";
        setTimeout(hideError, 3000);
    }

    function hideError() {
        const errorElement = document.getElementById("errorMessage");
        errorElement.style.display = "none";
    }
</script>

    
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