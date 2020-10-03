<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo('Beta Tester '.$_SESSION['userID']); ?> | TruckersDB</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/profile.css">
	<link rel="icon" href="assets/img/icon.png">
</head>
<body>
    <?php require_once("assets/common/navigation.php"); ?>
    
    <div class="container"><br>
		<div id="profile" style="display: grid; grid-gap: 10px; min-height: calc(100vh - 180px);">
			<div id="profileSide" style="position: relative;">
				<img src="assets/img/default-user.png" id="profileImg" style="background: #fff; border-radius: 50%; border: 1px solid black; width: 150px; height: 150px; margin-left: calc((100% - 150px) / 2);">
				<div id="profileBio" style="text-align: center; border: 1px solid black; border-radius: 3px; padding: 60px 15px 15px; margin-top: -50px; min-height: calc(100% - 100px); display: grid; grid-template-rows: 1fr auto;">
					<div id="bio-top">
						<h2 style="line-height: 1; margin: 0 0 10px;"><?php echo("Beta Tester ".$_SESSION['userID']); ?></h2>
					<?php if($_SESSION['perms']['tdb_staff'] == 1){ ?><span class="badge" style="background: #fc7900; color: #fff;">TruckersDB Staff</span><?php } ?>
                    <span class="badge" style="background: #f0b70c; color: #fff;">#TDBv5 Tester</span>
                    <span style="display: block;">Joined <strong>October 2020</strong></span>
					<span style="display: block; margin-top: 20px;" id="bio">This is an example bio for the user profile page. I don't really need to put a lot here, but this is just to make the page look better. :) Aaaaand this will get it up to 255 which should theoretically be the maximum character limit for the bio. Yep! Now..</span>
					</div>
					<div id="socials" style="text-align: left;">
						<a id="social-discord" href="#" style="display: block; margin-top: 15px;"><img src="assets/img/discord.svg" width="32"> &nbsp; Discord Username#1234</a>
						<a id="social-twitter" href="#" style="display: block; margin-top: 15px;"><img src="assets/img/twitter.svg" width="32"> &nbsp; @TwitterUser</a>
						<a id="social-truckersmp" href="#" style="display: block; margin-top: 15px;"><img src="assets/img/tmp.png" width="32"> &nbsp; TruckersMP Username</a>
						<a id="social-steam" href="#" style="display: block; margin-top: 15px;"><img src="assets/img/steam.svg" width="32"> &nbsp; Steam Username</a>
						<a id="social-other" href="#" style="display: block; margin-top: 15px;"><img src="assets/img/other-social.svg" width="32"> &nbsp; Other Social Media</a>
					</div>
				</div>
			</div>
			<div id="profileMain">
				<div id="userStats">
                    <h3>User Statistics</h3>
                    <div id="stats">
                        <div><h4>99,999,999<small> MI</small></h4><span>Distance Driven</span></div>
                        <div><h4>99,999</h4><span>Deliveries Made</span></div>
                        <div><h4>9,999</h4><span>Events Attended</span></div>
                        <div><h4>------</h4><span>------</span></div>
                    </div>
                </div>
                <div id="userInfo"> <!-- Owned Games, TMP Status, etc. -->
                    <h3>About <?php echo('Beta Tester '.$_SESSION['userID']); ?></h3>
                    <div id="info" style="text-align: center;">
                        Soon&trade;
                        <!-- Things maybe will go here? Possibly a 2-wide or 3-wide grid with the things? -->
                    </div>
                </div>
                <div id="companyDetails"> <!-- Remove this if they aren't part of a company?? -->
                    <h3>Company Details</h3>
                    <div id="details" style="text-align: center;">
                        Soon&trade;
                        <!-- Company Details will go here when a layout is decided! -->
                    </div>
                </div>
                <div id="recentJobs">
                    <h3>Recent Deliveries</h3>
                    <div id="jobs" style="text-align: center; /*  -- useful for lazy loading/api calls - use a class? --  background: url('assets/img/loader.svg') no-repeat center; background-size: contain; min-height: 100px; */">
                        This user hasn't recorded any deliveries yet!
                    </div>
                </div>
			</div>
		</div>
    </div>
    
    <footer class="footer">
      <div class="container">
		  TruckersDB <span><a href="#">GDPR/Privacy Notice</a></span> <span><a href="#">Terms of Service</a></span>
      </div>
    </footer>
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
    <script>
        
    </script>
</body>
</html>