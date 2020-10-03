<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo("USER PLACEHOLDER"); ?> | TruckersDB</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="icon" href="assets/img/icon.png">
</head>
<body>
    <?php require_once("assets/common/navigation.php"); ?>
	
	<style>
		#profile{
			grid-template-columns: 1fr 3fr;
		}
		#profileBio #bio{
			margin-bottom: 50px;
		}
		@media(max-width:1200px){
			#profile{
				grid-template-columns: 1fr;
			}
		}
	</style>
    
    <div class="container"><br>
		<div id="profile" style="display: grid; grid-gap: 10px; min-height: calc(100vh - 180px);">
			<div id="profileSide" style="position: relative;">
				<img src="assets/img/default-user.png" id="profileImg" style="background: #fff; border-radius: 50%; border: 1px solid black; width: 150px; height: 150px; margin-left: calc((100% - 150px) / 2);">
				<div id="profileBio" style="text-align: center; border: 1px solid black; border-radius: 3px; padding: 60px 15px 15px; margin-top: -50px; min-height: calc(100% - 100px); display: grid; grid-template-rows: 1fr auto;">
					<div id="bio-top">
						<h2 style="line-height: 1; margin: 0 0 10px;"><?php echo("Beta Tester ".$_SESSION['userID']); ?></h2>
					<?php if($_SESSION['perms']['tdb_staff'] == 1){ ?><span style="border-radius: 50px; background: #fc7900; color: #fff; line-height: 1; padding: 5px 10px; font-size: 13px; margin-bottom: 20px; display: inline-block;">TruckersDB Staff</span><?php } ?>
					<span style="display: block;" id="bio">This is an example bio for the user profile page. I don't really need to put a lot here, but this is just to make the page look better. :)</span>
					</div>
					<div id="socials" style="text-align: left;">
						<span id="social-discord" style="display: block; margin-top: 15px;"><img src="assets/img/discord.svg" width="32"> &nbsp; DiscordUsername#1234</span>
						<span id="social-twitter" style="display: block; margin-top: 15px;"><img src="assets/img/twitter.svg" width="32"> &nbsp; @TwitterUser</span>
						<span id="social-truckersmp" style="display: block; margin-top: 15px;"><img src="assets/img/tmp.png" width="32"> &nbsp; TruckersMP Username</span>
						<span id="social-truckersmp" style="display: block; margin-top: 15px;"><img src="assets/img/other-social.svg" width="32"> &nbsp; Other Social Media 1</span>
						<span id="social-truckersmp" style="display: block; margin-top: 15px;"><img src="assets/img/other-social.svg" width="32"> &nbsp; Other Social Media 2</span>
					</div>
				</div>
			</div>
			<div id="profileMain" style="border: 1px solid black; padding: 10px; border-radius: 3px;">
				
			</div>
		</div>
    </div>
    
    <footer class="footer">
      <div class="container">
		  TruckersDB <span><a href="#">GDPR/Privacy Notice</a></span> <span><a href="#">Terms of Service</a></span>
      </div>
    </footer>
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
</body>
</html>