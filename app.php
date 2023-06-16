<?php
$conn = mysqli_connect('localhost', 'root', '', 'scanning', 3306);
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender =  $_POST["gender"];
    $service = $_POST["service"];
    $doctor = $_POST["doctor"];
    $phone_no = $_POST["phone_no"];

    // Step 3: Validate and sanitize form data (you can add your own validation logic here)

    $insert = "INSERT INTO appointments (name, age, gender, service, doctor, phone_no) VALUES ('$name', '$age', '$gender', '$service', '$doctor', '$phone_no')";
    mysqli_query($conn, $insert);

    if (mysqli_query($conn, $insert)) {
        echo "Appointment booked successfully.";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }

    // Step 5: Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="text" name="name" required placeholder="Enter your name">
<input type="submit" name="submit" value="Register Now" class="form-btn">
</body>
</html>