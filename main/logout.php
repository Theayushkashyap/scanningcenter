<?php
@include 'config.php';

session_start();
session_unset();
session_destroy();


header('location:http://localhost/scanningcenter/main/login_form.php')

?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
	<h2>You have been logged out.</h2>
	<script>
		// Delay redirect to login page by 3 seconds
		setTimeout(() => {
			window.location.href = "login.php";
		}, 3000);
	</script>
</body>
</html>