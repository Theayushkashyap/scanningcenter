<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link rel="stylesheet" href="patient-data.css">
</head>

<body>
    <div class="hero">
        <nav>
            <img src="../images/Untitled-1.png" class="logo">

            <ul>
                <li><a href="staffpage.php">Home</a></li>
                <li><a href="#">Archive</a></li>
                <li><a href="#">Daily Report</a></li>
                <li><a href="#">Payment Details</Details></a></li>
            </ul>
            <img src="../images/user.png" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../images/user.png">

                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/profile.png">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/setting.png">
                        <p>Settings & Privacy </p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../images/help.png">
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="../index.html" class="sub-menu-link">
                        <img src="../images/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>

                </div>
            </div>

        </nav>
      
    <div class="container">
        <div class="title">
            Registration Form
        </div>
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