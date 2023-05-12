<?php

$conn = mysqli_connect('localhost', 'root', '', 'scanning', 3306);

$name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $user_type = $_POST['user_type'];


// prepare and bind the data
$insert = "INSERT INTO user_form (name, email, password, user_type) VALUES ('$name', '$email', '$hash', '$user_type')";
mysqli_query($conn, $insert);


// set parameters and execute
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact_info = $_POST['contact'];
$referral_doctor = $_POST['referral'];
$dropdown_menu = $_POST['dropdown'];
$stmt->execute();

// close the statement and connection
$stmt->close();
$conn->close();
?>

?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Register Form</title>
</head>
<body>
 <form>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br>

  <label for="age">Age:</label>
  <input type="number" id="age" name="age"><br>

  <label for="gender">Gender:</label>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br>

  <label for="contact">Contact Info:</label>
  <textarea id="contact" name="contact"></textarea><br>

  <label for="referral">Referral Doctor:</label>
  <input type="text" id="referral" name="referral"><br>

  <label for="dropdown">Dropdown Menu:</label>
  <select id="dropdown" name="dropdown">
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
  </select><br>

  <input type="submit" value="Submit">
</form>
</body>
</html>