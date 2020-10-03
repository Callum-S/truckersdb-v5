<?php
session_start();

if(!isset($_SESSION['userID']))
{
    header('Location: https://v5.truckersdb.net');
}

$user = filter_var($_GET['user'], FILTER_SANITIZE_NUMBER_INT);
if(!isset($user) || $user == '')
{
    $user = $_SESSION['userID'];
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Profile | TruckersDB</title>
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
						<h2 style="line-height: 1; margin: 0 0 10px;"><?php echo($_SESSION['userID']); ?></h2>
					<?php if($_SESSION['perms']['tdb_staff'] == 1){ ?><span class="badge" style="background: #fc7900; color: #fff;" data-toggle="tooltip" title="Part of the TruckersDB Team">TruckersDB Staff</span><?php } ?>
                    <span class="badge" style="background: #f0b70c; color: #fff;" data-toggle="tooltip" title="Beta Tester for the v5 site">#TDBv5 Tester</span>
                    <span  id="dateJoined" style="display: block;">Joined <strong>January 1970</strong></span>
					<span style="display: block; margin-top: 20px;" id="bio"></span>
					</div>
					<div id="socials" style="text-align: left;">
						<a id="social-discord" href="#" target="_blank" style="display: block; margin-top: 15px;"><img src="assets/img/discord.svg" width="32"> &nbsp; <span>Discord Username#1234</span></a>
						<a id="social-twitter" href="#" target="_blank" style="display: block; margin-top: 15px;"><img src="assets/img/twitter.svg" width="32"> &nbsp; <span>@TwitterUser</span></a>
						<a id="social-truckersmp" href="#" target="_blank" style="display: block; margin-top: 15px;"><img src="assets/img/truckersmp.png" width="32"> &nbsp; <span>TruckersMP Username</span></a>
                        <a id="social-steam" href="#" target="_blank" style="display: block; margin-top: 15px;"><img src="assets/img/steam.svg" width="32"> &nbsp; <span>Steam Username</span></a>
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
                    <h3>About <?php echo($_SESSION['userID']); ?></h3>
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
        $.ajax({
            url: 'https://api.truckersdb.net/v3/user/userProfile.php',
            type: 'POST',
            data: {
                userID: <?php echo($user); ?>
            },
            success: function(res){
                if(res.status == 1){
                    // Add display name
                    $('#bio-top h2').text(res.response.profile.displayName);
                    document.title = res.response.profile.displayName + ' | TruckersDB';
                    $('#userInfo h3').text('About ' + res.response.profile.displayName);
                    // Display join date
                    var d = new Date(res.response.profile.dateCreated);
                    var m = d.getMonth() + 1;
                    switch(m){
                        case 1:
                            m = 'January';
                            break;
                        case 2:
                            m = 'February';
                            break;
                        case 3:
                            m = 'March';
                            break;
                        case 4:
                            m = 'April';
                            break;
                        case 5:
                            m = 'May';
                            break;
                        case 6:
                            m = 'June';
                            break;
                        case 7:
                            m = 'July';
                            break;
                        case 8:
                            m = 'August';
                            break;
                        case 9:
                            m = 'September';
                            break;
                        case 10:
                            m = 'October';
                            break;
                        case 11:
                            m = 'November';
                            break;
                        case 12:
                            m = 'December';
                            break;
                    }
                    var y = d.getFullYear();
                    var dateJoined = m + ' ' + y;
                    $('#dateJoined strong').text(dateJoined);
                    // Set user bio
                    $('#bio').text(res.response.profile.userBio);
                    // Set Discord
                    if(res.response.profile.discordID != '0'){
                        $('#social-discord').attr('href', 'https://discord.com/users/' + res.response.profile.discordID);
                        $('#social-discord span').text(res.response.profile.discordName);
                    }
                    // Set Twitter
                    if(res.response.profile.twitterID != '0'){
                        $('#social-twitter').attr('href', 'https://twitter.com/i/user/' + res.response.profile.twitterID);
                        $('#social-twitter span').text('@' + res.response.profile.twitterName);
                    }
                    // Set TruckersMP
                    if(res.response.profile.tmpID != '0'){
                        $('#social-truckersmp').attr('href', 'https://truckersmp.com/user/' + res.response.profile.tmpID);
                        $('#social-truckersmp span').text(res.response.profile.tmpName);
                    }
                    // Set Steam
                    if(res.response.profile.steamID != '0'){
                        $('#social-steam').attr('href', 'https://steamcommunity.com/profiles/' + res.response.profile.steamID);
                        $('#social-steam span').text(res.response.profile.steamName);
                    }
                    // Hide 'Other' Social Media (for now)
                    $('#social-other').hide();
                } else{
                    if(res.error == 'User does not exist.'){
                        window.location.replace(location.pathname);
                    } else{
                        alert('Error: ' + res.error);
                        window.location.href('https://v5.truckersdb.net');
                    }
                }
            }
        });
    </script>
</body>
</html>