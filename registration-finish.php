<?php
$pageTitle = "Registration Complete | TruckersDB";
$pageName = "registration-finish";
require_once("./assets/common/head.php");
?>
<body>
    <?php require_once("./assets/common/navigation.php"); ?>
    
    <div class="container">
		<h2>Thank you for joining us.</h2>
		<div id="reg-finish">
			<p style="user-select: none;">There's just one more step you need to complete before gaining access to our platform. Once you have activated your account, you'll be able to take advantage of everything we have to offer here at TruckersDB.<br><br><strong>Please check your email inbox for an activation link. If you cannot find it, and it is not in your spam/junk folder, please contact support.</strong></p>
            <img src="./assets/img/reg-finish.png" class="img-fluid" style="border-radius: 5px;">
		</div>
    </div>
    
    <?php require_once("./assets/common/footer.php"); ?>
    
    <?php require_once("./assets/common/scripts.php"); ?>
</body>
</html>