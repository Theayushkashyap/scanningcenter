<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link rel="stylesheet" href="patient-data.css">
</head>

<body>
 
    <div class="container">
        <div class="title">
            Registration Form
        </div>
        <a href="./staffpage.php" >                    
<button class="plus-button">x</button>
</a>     
        <div class="form">
            <div class="input-field">
                <label>First Name</label>
                <input type="text" class="input">
            </div>
            <div class="input-field">
                <label>Last Name</label>
                <input type="text" class="input">
            </div>
            <div class="input-field">
                <label>Password</label>
                <input type="password" class="input">
            </div>
            <div class="input-field">
                <label>Confirm Password</label>
                <input type="password" class="input">
            </div>
            <div class="input-field">
                <label>Gender</label>
                <div class="custom_select">
                <select>
                    <option>Select</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            </div>
            <div class="input-field">
                <label>Email Address</label>
                <input type="text" class="input">
            </div>
            <div class="input-field">
                <label>Phone Number</label>
                <input type="text" class="input">
            </div>
            <div class="input-field">
                <label>Address</label>
                <textarea class="textarea"></textarea>
            </div>
            <div class="input-field">
                <input type="submit" value="Register" class="btn">
            </div>
        </div>
    </div>
    </div>
</body>

</html>