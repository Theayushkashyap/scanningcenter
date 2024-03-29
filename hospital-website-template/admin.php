<?php
@include 'config.php';
session_start();
if(!isset( $_SESSION['admin_name'])){
    header('location:http://localhost/scanningcenter/main/login_form.php');
}
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

?>
<!DOCTYPE html>
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
    <link rel="preconnect" href="https://fonts.gsta+tic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

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
    <link rel="stylesheet" href="/hospital-website-template/css/admin1.css">
</head>
<body>
        <!-- Topbar Start -->
        <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+012 345 6789</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>info@example.com</a>
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
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Vismaya Scanning Center</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                    
                        <a href="../main/register.php" class="nav-item nav-link">Add New Staff</a> 
                        <a href="Drdetails.php" class="nav-item nav-link">Dr Details</a>
                        <a href="http://localhost:3000/hospital-website-template/report.php" class="nav-item nav-link">Daily Report</a>                      
                      
                        <a href="login.php" class="nav-item nav-link">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
<div class="wrapper">
    <div class="containerr">
    <i class="fa-solid fa-users-medical"></i>
    <span class="num" data-val="15000">1000+</span>
    <span class="text">Patients</span>
    </div>
    <div class="containerr">
    <i class="fa-solid fa-users-medical"></i>
    <span class="num" data-val="10">000</span>
    <span class="text">Staffs</span>
    </div>
</div>
   
    <script src="/hospital-website-template/js/admin1.js"></script>
    <script>
                        let valueDisplays = document.querySelectorAll(".num");
                        let patientValueDisplay = valueDisplays[0]; // Selecting the element for the number of patients
                        let staffValueDisplay = valueDisplays[1]; // Selecting the element for the number of staff
                        let interval = -10000;
    
                        // Adjust the duration to increase or decrease the speed of the counters.
                        let patientDuration = 10; // Change this value to adjust the speed of patient counter.
                        let staffDuration = 95; // Change this value to slow down the staff counter.
    
                        let startPatientValue = 1000;
                        let endPatientValue = parseInt(patientValueDisplay.getAttribute("data-val"));
    
                        let startStaffValue = 0;
                        let endStaffValue = parseInt(staffValueDisplay.getAttribute("data-val"));
    
                        function updatePatientCounter() {
                            startPatientValue += Math.ceil((endPatientValue - startPatientValue) / patientDuration);
                            patientValueDisplay.textContent = (startPatientValue < endPatientValue ? startPatientValue : endPatientValue) + "+";
                            if (startPatientValue < endPatientValue) {
                                requestAnimationFrame(updatePatientCounter);
                            }
                        }
    
                        function updateStaffCounter() {
                            startStaffValue += Math.ceil((endStaffValue - startStaffValue) / staffDuration);
                            staffValueDisplay.textContent = (startStaffValue < endStaffValue ? startStaffValue : endStaffValue);
                            if (startStaffValue < endStaffValue) {
                                requestAnimationFrame(updateStaffCounter);
                            }
                        }
    
                        updatePatientCounter();
                        updateStaffCounter();
                    </script>
</body>
</html>