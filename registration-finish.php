<?php
session_start();
if(isset($_SESSION['userID']))
{
    header("Location: https://v5.truckersdb.net");
}
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
    <link rel="stylesheet" type="text/css" href="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.css"/><script src="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.js" defer></script><script>window.addEventListener("load", function(){window.wpcc.init({"colors":{"popup":{"background":"#222222","text":"#ffffff","border":"#222222"},"button":{"background":"#fc7900","text":"#000000"}},"position":"bottom","padding":"none","corners":"small","margin":"large","transparency":"10"})});</script>
</head>
<body>
    <?php require_once("assets/common/navigation.php"); ?>
    
    <div class="container">
		<h2>Thank you for joining us.</h2>
		<div id="reg-finish">
			<p style="user-select: none;">There's just one more step you need to complete before gaining access to our platform. Once you have activated your account, you'll be able to take advantage of everything we have to offer here at TruckersDB. <strong>Please check your email inbox for an activation link. If you cannot find it, and it is not in your spam/junk folder, please contact support.</strong></p><br>
			<img src="assets/img/reg-finish.png" class="img-fluid" style="border-radius: 5px; margin-bottom: 75px;">
		</div>
    </div>
    
    <?php require_once("./assets/common/footer.php"); ?>
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
</body>
</html>