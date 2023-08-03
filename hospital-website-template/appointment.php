<?php
// Connect to MySQL database
@include '/scanningcenter/main/config.php';

$conn = mysqli_connect('localhost', 'root', '', 'scanning', 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate form data
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
    $consultingDr = filter_input(INPUT_POST, "consulting_dr", FILTER_SANITIZE_STRING);
    $scanning = filter_input(INPUT_POST, "scanning", FILTER_SANITIZE_STRING);

    // Prepare and bind the SQL query with prepared statement
    $sql = "INSERT INTO appointments (name, gender, age, phone, email, address, consultingDr, scanning) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssisssss", $name, $gender, $age, $phone, $email, $address, $consultingDr, $scanning);

    // Execute the query
    if ($stmt->execute()) {
        // Data inserted successfully
        $message = "Appointment successfully! Thank you for choosing Vismaya Scanning. Our team will reach out to you soon.";
    } else {
        // Error handling
        $message = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<!-- The rest of your HTML code goes here -->

<!-- After the "Make An Appointment" form, you can add the notification message -->
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-success mt-4" role="alert" id="notification" style="display: none;">
                <?php echo $message; ?>
            </div>
        </div>
    </div>
</div>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vismaya Scanning & X-ray Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+012
                            345 6789</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i
                                class="bi bi-envelope me-2"></i>info@example.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm mb-5">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Vismaya
                        Scanning Center</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Home</a>

                        <a href="price.html" class="nav-item nav-link">Pricing</a>
                        <a href="http://localhost:3000/hospital-website-template/report.php"
                            class="nav-item nav-link">Download Report</a>

                        <a href="login.php" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Appointment Start -->
    
    <div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Appointment</h5>
                        <h1 class="display-4">Make An Appointment For Your Family</h1>
                    </div>
                    <p class="text-white mb-5">Our dedicated team of healthcare professionals is here to
                        provide top-quality care and support for your loved ones. To
                        schedule an appointment for your family, simply fill out the
                        appointment request form.

                    </p>
                    <style>
                        /* Hide the details element by default */
                        details {
                            display: none;
                        }

                        /* When the input is checked, display the details element */
                        input:checked+details {
                            display: block;
                        }

                        /* Style the "Read More" button */
                        .btn-container {
                            display: inline-block;
                            cursor: pointer;
                            padding: 10px;
                            border: 1px solid #ffffff;
                            border-radius: 5px;
                        }
                    </style>

                    <!-- Wrap the input and details elements with a label -->
                    <label for="details-toggle" class="btn-container" style="color: #ffffff;">
                        Read More
                        <input type="checkbox" id="details-toggle" style="display: none;">
                        <details>
                            <summary>
                                Please provide your contact information and preferred dates,
                                and we will do our best to accommodate your schedule.
                                Our staff will get in touch with you shortly to confirm the
                                appointment and answer any questions you may have.
                                Thank you for choosing us as your healthcare partner.
                                We look forward to serving you and your family's medical needs.
                            </summary>
                        </details>
                    </label>

                </div>
                <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Book An Appointment</h1>
                        <form method="post">
    <div class="row g-3">
        <!-- First row: Name -->
        <div class="col-12">
            <input type="text" name="name" class="form-control bg-light border-0" placeholder="Name" style="height: 55px;">
        </div>

        <!-- Second row: Gender and Age -->
        <div class="col-6">
            <select name="gender" class="form-select bg-light border-0" style="height: 55px;">
                <option selected disabled>Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="col-6">
            <input type="number" name="age" class="form-control bg-light border-0" placeholder="Age" style="height: 55px;">
        </div>

        <!-- Third row: Phone and Email -->
        <div class="col-6">
            <div style="display: flex;">
                <span style="padding: 15px 10px;">+91</span>
                <input type="text" name="phone" class="form-control bg-light border-0" placeholder="Phone no" style="height: 55px;">
            </div>
        </div>
        <div class="col-6">
            <input type="email" name="email" class="form-control bg-light border-0" placeholder="Email" style="height: 55px;">
        </div>

        <!-- Fourth row: Address -->
        <div class="col-12">
            <input type="text" name="address" class="form-control bg-light border-0" placeholder="Address" style="height: 55px;">
        </div>

        <!-- Fifth row: Consulting Dr and Study -->
        <div class="col-6">
            <input type="text" name="consulting_dr" class="form-control bg-light border-0" placeholder="Consulting Dr." style="height: 55px;">
        </div>
        <div class="col-6">
            <select name="scanning" class="form-select bg-light border-0" style="height: 55px;">
                <option selected disabled>Select scanning</option>
                <option value="Abdominopelvic Scan">Abdominopelvic Scan</option>
                <option value="Abdominopelvic + Scrotal Scan">Abdominopelvic + Scrotal Scan</option>
                <option value="3">Obstetric Anomaly Scan</option>
                                        <option value="Obstetric Growth Scan">Obstetric Growth Scan</option>
                                        <option value="Obstetric Doppler / Fecal Echo Scan">Obstetric Doppler / Fecal Echo Scan</option>
                                        <option value="Early Pregnancy(Dating)">Early Pregnancy(Dating)</option>
                                        <option value="Early Pregnancy(NT/NB)">Early Pregnancy(NT/NB)</option>
                                        <option value="Lower/ Upper Limb Doppler">Lower/ Upper Limb Doppler</option>
                                        <option value="Renal Doppler">Renal Doppler</option>
                                        <option value="Scrotal Doppler">Scrotal Doppler</option>
                                        <option value="Follicular Study">Follicular Study</option>
                                        <option value="Penile Scan">Penile Scan</option>
                                        <option value="MSK(Thyroid / Breast / Small Parts)">MSK(Thyroid / Breast / Small Parts)</option>
                                        <option value="TV Scan">TV Scan</option>
                                    </select>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Make An Appointment</button>
        </div>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Check if the PHP message variable is set
        <?php if (isset($message)) : ?>
            // Display the notification
            alert("<?php echo $message; ?>");
        <?php endif; ?>
    });
</script>




    <!-- Appointment End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
                <h1 class="display-4">Medical Assitance</h1>
            </div>
            <div class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-primary">scan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal"
                                    style="font-size: 22px; line-height: 45px;">₹</small>600<small
                                    class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p>Abdominal ultrasound is an imaging test that used to diagnose a wide range of medical issues
                            safely. It is fast and almost painless</p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 my-2">Book Now</a>
                    </div>
                </div>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-primary">Pregnancy Scan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal"
                                    style="font-size: 22px; line-height: 45px;">₹</small>800<small
                                    class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p>An early pregnancy scan (dating or booking scan) between 11 and 14 weeks.a mid-pregnancy scan
                            (also known as a fetal anomaly scan) between 18 and 21 weeks

                        </p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 my-2">Book Now</a>
                    </div>
                </div>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-primary">TV Scan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal"
                                    style="font-size: 22px; line-height: 45px;">₹</small>800<small
                                    class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p>A transvaginal scan, also known as an internal or endovaginal ultrasound scan.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 my-2">Book Now</a>
                    </div>
                </div>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-primary">X-Ray</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal"
                                    style="font-size: 22px; line-height: 45px;">₹</small>700<small
                                    class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p>X-ray imaging creates pictures of the inside of your body.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 my-2">Book Now</a>
                    </div>
                </div>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-primary">Obstetric Growth Scan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal"
                                    style="font-size: 22px; line-height: 45px;">₹</small>1500<small
                                    class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p>A Growth Scan is normally done, between 28 – 32 weeks of pregnancy, to assess the growth of
                            your baby and amount of liquor.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 my-2">Book Now</a>
                    </div>
                </div>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-primary">Follicular Study
                            </h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal"
                                    style="font-size: 22px; line-height: 45px;">₹</small>700<small
                                    class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p>Follicular scan or follicular monitoring. This involves a series of scans to ascertain when
                            the mature egg will be released and the uterine walls will thicken.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 my-2">Bok Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Pricing Plan End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Get In Touch</h4>

                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Address: 3rd Main Rd, opposite
                        Krishna Raja Extension, Krishna Raja Extension, Tiptur, Karnataka 572202</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="about.html"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="report.php"><i class="fa fa-angle-right me-2"></i>Download Your
                            Report</a>
                        <a class="text-light" href="contact.html"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="about.html"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="appointment.php"><i class="fa fa-angle-right me-2"></i>Book an
                            apointment</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Office</a>
                        <a class="text-light" href="contact.html"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Newsletter</h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-primary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Vismaya Scanning Center</a>. All Rights
                        Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>