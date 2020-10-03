<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Complete | TruckersDB</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="icon" href="assets/img/icon.png">
</head>
<body>
    <?php require_once("assets/common/navigation.php"); ?>
    
    <div class="container">
		<h2>Thank you for joining us.</h2>
		<div id="reg-finish">
			<p style="user-select: none;">There's just one more step you need to complete before gaining access to our platform. Once you have activated your account, you'll be able to take advantage of everything we have to offer here at TruckersDB. <strong>Please check your email inbox for an activation link. If you cannot find it, and it is not in your spam/junk folder, please contact support.</strong></p><br>
			<img src="assets/img/reg-finish.png" class="img-fluid" style="border-radius: 5px;">
		</div>
    </div>
    
    <footer class="footer" style="position: fixed; bottom: 0;">
      <div class="container">
		  TruckersDB <span><a href="#">GDPR/Privacy Notice</a></span> <span><a href="#">Terms of Service</a></span>
      </div>
    </footer>
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
</body>
</html>