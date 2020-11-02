<?php
session_start();

$user = filter_var($_GET['user'], FILTER_SANITIZE_NUMBER_INT);
if(!isset($user) || $user == '')
{
    if(!isset($_SESSION['userID'])){
        header('Location: https://v5.truckersdb.net');
    } else{
        $user = $_SESSION['userID'];
    }
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
                <?php if($user == $_SESSION['userID']){ ?><button id="editProfileBtn" class="btn btn-lg" data-toggle="modal" data-target="#editProfileModal"><i class="fas fa-edit"></i></button><?php } ?>
                
                <div id="profileImg" style="background: url('assets/img/users/default.png') no-repeat center; background-size: cover; border-radius: 50%; border: 1px solid black; width: 150px; height: 150px; margin-left: calc((100% - 150px) / 2); clip-path: circle(50% at 50% 50%);"></div>
                
				<div id="profileBio" style="text-align: center; border: 1px solid black; border-radius: 3px; padding: 60px 15px 15px; margin-top: -50px; min-height: calc(100% - 100px); display: grid; grid-template-rows: 1fr auto;">
					<div id="bio-top">
						<h2 style="line-height: 1; margin: 0 0 10px;">User</h2>
                        <div id="badges"></div>
                    <span  id="dateJoined" style="display: block;">Joined <strong>January 1970</strong></span>
					<span style="display: block; margin-top: 20px;" id="bio"></span>
					</div>
					<div id="socials" style="text-align: left;">
						<a id="social-discord" href="#" target="_blank" style="display: block; margin-top: 15px;"><img draggable="false"  src="assets/img/discord.svg" width="32"> &nbsp; <span>Discord Username#1234</span></a>
						<a id="social-twitter" href="#" target="_blank" style="display: block; margin-top: 15px;"><img draggable="false"  src="assets/img/twitter.svg" width="32"> &nbsp; <span>@TwitterUser</span></a>
						<a id="social-truckersmp" href="#" target="_blank" style="display: block; margin-top: 15px;"><img  draggable="false" src="assets/img/truckersmp.png" width="32"> &nbsp; <span>TruckersMP Username</span></a>
                        <a id="social-steam" href="#" target="_blank" style="display: block; margin-top: 15px;"><img draggable="false"  src="assets/img/steam.svg" width="32"> &nbsp; <span>Steam Username</span></a>
						<a id="social-other" href="#" style="display: block; margin-top: 15px;"><img draggable="false"  src="assets/img/other-social.svg" width="32"> &nbsp; Other Social Media</a>
					</div>
				</div>
			</div>
			<div id="profileMain">
				<div id="userStats">
                    <!--<h3>User Statistics</h3>-->
                    <div id="stats">
                        <div><h4 id="statsDistanceDriven">0<small> MI</small></h4><span>Distance Driven</span></div>
                        <div><h4 id="statsDeliveriesMade">0</h4><span>Deliveries Made</span></div>
                        <div><h4 id="statsEventsAttended">0</h4><span>Events Attended</span></div>
                        <div><h4 id="statsHoursPlayed">0<small> HRS</small></h4><span>Hours Played</span></div>
                    </div>
                </div>
                <div id="userInfo" class="row"> <!-- Owned Games, TMP Status, etc. -->
                    <div class="col">
                        <h3>Achievements</h3>
                        <div id="achievements">
                            <span id="no-achievements">No achievements found!</span>
                        </div>
                        <button id="viewAllAchievements" class="btn btn-block btn-orange" data-toggle="modal" data-target="#allAchievementsModal">View All Achievements (<span class="achievement-count">0</span>)</button>
                    </div>
                    <div class="col">
                        <h3>Owned Games</h3>
                        <div id="ownedGames">
                            <div id="ownedATS" style="filter: grayscale(100%) blur(3px);" data-toggle="tooltip" title="American Truck Simulator">
                                <img draggable="false" src="assets/img/ats.jpg">
                                <span></span>
                            </div>
                            <div id="ownedETS2" style="filter: grayscale(100%) blur(3px);" data-toggle="tooltip" title="Euro Truck Simulator 2">
                                <img draggable="false" src="assets/img/ets2.jpg">
                                <span></span>
                            </div>
                        </div>
                        <h3>TruckersMP</h3>
						<div>
                   			<span style="color: black">Currently offline</span>
                   			<br>
                   			<span style="color: green;">No recent bans</span>
                   		</div>
                    </div>
                </div>
                <div id="companyDetails" style="display: none;"> <!-- Remove this if they aren't part of a company?? -->
                    <h3>TestVTC</h3>
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
    
    <?php require_once("./assets/common/footer.php"); ?>
    
    
<div class="modal fade" id="allAchievementsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Achievements (<span class="achievement-count">0</span>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Return to Profile">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="allAchievements">
            
        </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light btn-block" data-dismiss="modal" aria-label="Close">
                Return to Profile
            </button>
        </div>
    </div>
  </div>
</div>
    
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="close editProfileCancel" data-dismiss="modal" aria-label="Cancel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editUserProfile" autocomplete="off">
          <div class="modal-body">
              <input type="hidden" name="userID" value="<?php echo($_SESSION['userID']); ?>">
            <div class="row" style="margin-bottom: 10px;">
            	<div class="col" style="position: relative;">
            		<div id="profileImagePreview" style="background: url('./assets/img/users/default.png') no-repeat center; background-size: cover; border-radius: 50%; height: 130px; width: 130px; margin: 0 auto;"></div>
            	</div>
            	<div class="form-group">
             		<label for="editProfileImage">Change Profile Image</label>
             		<input type="file" class="form-control-file" id="editProfileImage">
             		<small id="editProfileImageHelp" class="form-text text-muted">Max. file size: 10MB</small>
             	</div>
            </div>
              <div class="form-group">
                  <label for="editDisplayName">Display Name</label>
                  <input type="text" class="form-control" id="editDisplayName" maxlength="20">
                  <small id="editDisplayNameHelp" class="form-text text-muted">Less than 20 characters, may contain spaces.</small>
              </div>
              <div class="form-group">
                  <label for="editUserBio">Bio</label>
                  <textarea class="form-control" id="editUserBio" maxlength="255" style="resize: none;"></textarea>
                  <small id="editUserBioHelp" class="form-text text-muted"><span id="bioCharCount">255</span> characters remaining</small>
              </div>
          <span>You can manage your linked accounts and change other settings on the <a href="#" data-toggle="tooltip" title="This will NOT save your changes.">Account Settings</a> page.</span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light editProfileCancel" data-dismiss="modal" style="width: 20%;">Cancel</button>
            <button type="submit" id="editProfileSave" class="btn btn-orange" style="position: relative; width: 60%;">
                <span class="spinner-border text-light" id="editProfileSpinner" role="status" aria-hidden="true" style="position: absolute; left: 15px; top: 8px; height: 20px; width: 20px;"></span>
                Save changes
            </button>
        </div>
    </form>
    </div>
  </div>
</div>
    
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
    <script>
        $('#socials a').hide();
        $('#editProfileSpinner').hide();
        loadProfile();
        
        function loadProfile(){
            $.ajax({
                url: 'https://api.truckersdb.net/v3/user/userProfile.php',
                type: 'POST',
                data: {
                    userID: <?php echo($user); ?>
                },
                success: function(res){
                    if(res.status == 1){
                        <?php if($user == $_SESSION['userID']) { ?>
                        $('#editProfileBtn').tooltip({title: 'Edit Profile'});
                        $('#editDisplayName').val(res.response.profile.displayName);
                        $('#editUserBio').text(res.response.profile.userBio);

                        $('#bioCharCount').text(255 - ($('#editUserBio').val().length));
                        $('#editUserBio').keyup(function(){
                            var charsLeft = 255 - ($('#editUserBio').val().length);
                            $('#bioCharCount').text(charsLeft);
                        });

                        /*$('#editUserProfile').submit(function(e){
                            e.preventDefault();
                            var newDisplayName = $('#editDisplayName').val();
                            var newUserBio = $('#editUserBio').val();
                            $('#editProfileSpinner').show();
                            $('#editProfileSave').attr('disabled', 'true');
                            $('#editDisplayName').attr('disabled', 'true');
                            $('#editUserBio').attr('disabled', 'true');
                            $('.editProfileCancel').attr('disabled', 'true');
                            $.ajax({
                                url: 'https://api.truckersdb.net/v3/user/updateProfile.php',
                                type: 'POST',
                                data: {
                                    userID: <?php //echo($_SESSION['userID']); ?>,
                                    displayName: newDisplayName,
                                    userBio: newUserBio,
                                    lang: 'en'
                                },
                                success: function(res){
                                    if(res.status == 1){
                                        window.location.href = 'updateProfile.php?displayName=' + encodeURIComponent(newDisplayName) + '&return=' + encodeURI(window.location.href);
                                    } else{
                                        $('#editProfileSpinner').hide();
                                        $('#editProfileSave').attr('disabled', 'false');
                                        $('#editDisplayName').attr('disabled', 'false');
                                        $('#editUserBio').attr('disabled', 'false');
                                        $('.editProfileCancel').attr('disabled', 'false');
                                        alert('Error: ' + res.error + ' Please try again later.');
                                    }
                                }
                            });
                        });*/
						
						// Edited for profile image (testing!)
						$('#editUserProfile').submit(function(e){
                            e.preventDefault();
                            $('#editProfileSpinner').show();
                            $('#editProfileSave').attr('disabled', 'true');
							$('#editProfileImage').attr('disabled', 'true');
                            $('#editDisplayName').attr('disabled', 'true');
                            $('#editUserBio').attr('disabled', 'true');
                            $('.editProfileCancel').attr('disabled', 'true');
                            $.ajax({
                                url: 'https://api.truckersdb.net/v3/user/updateProfileTest.php',
                                type: 'POST',
                                data: new FormData(this),
								
								cache: false,
								contentType: false,
								processData: false,
								
                                success: function(res){
                                    if(res.status == 1){
                                        window.location.href = 'updateProfile.php?displayName=' + encodeURIComponent(newDisplayName) + '&return=' + encodeURI(window.location.href);
                                    } else{
                                        $('#editProfileSpinner').hide();
                                        $('#editProfileSave').attr('disabled', 'false');
										$('#editProfileImage').attr('disabled', 'false');
                                        $('#editDisplayName').attr('disabled', 'false');
                                        $('#editUserBio').attr('disabled', 'false');
                                        $('.editProfileCancel').attr('disabled', 'false');
                                        alert('Error: ' + res.error + ' Please try again later.');
                                    }
                                }
                            });
                        });

						/* Profile Image Preview */
						$("#editProfileImage").change(function() {
							if (this.files && this.files[0]) {
							var reader = new FileReader();

							reader.onload = function(e) {
								$('#profileImagePreview').css('background', 'url('+e.target.result+') no-repeat center');
								$('#profileImagePreview').css('background-size', 'cover');
							}

							reader.readAsDataURL(this.files[0]); // convert to base64 string
						  }
						});

                        <?php } ?>
                        
                        // Add display name
                        $('#bio-top h2').text(res.response.profile.displayName);
                        document.title = res.response.profile.displayName + ' | TruckersDB';
                        // Display join date
                        var dateJoined = formatTimestamp(res.response.profile.dateCreated);
                        $('#dateJoined strong').text(dateJoined.month + ' ' + dateJoined.year);
                        // Set user bio
                        $('#bio').text(res.response.profile.userBio);
						// Profile Image
						$('#profileImg').css('background', 'url('+res.response.profile.profileImage+') no-repeat center');
                        $('#profileImg').css('background-size', 'cover');
                        $('#profileImagePreview').css('background', 'url('+res.response.profile.profileImage+') no-repeat center');
                        $('#profileImagePreview').css('background-size', 'cover');
                        // Set Discord
                        if(res.response.profile.discordID != '0'){
                            $('#social-discord').show().attr('href', 'https://discord.com/users/' + res.response.profile.discordID);
                            $('#social-discord span').text(res.response.profile.discordName);
                        }
                        // Set Twitter
                        if(res.response.profile.twitterID != '0'){
                            $('#social-twitter').show().attr('href', 'https://twitter.com/i/user/' + res.response.profile.twitterID);
                            $('#social-twitter span').text('@' + res.response.profile.twitterName);
                        }
                        // Set TruckersMP
                        if(res.response.profile.tmpID != '0'){
                            $('#social-truckersmp').show().attr('href', 'https://truckersmp.com/user/' + res.response.profile.tmpID);
                            $('#social-truckersmp span').text(res.response.profile.tmpName);
                        }
                        // Set Steam
                        if(res.response.profile.steamID != '0'){
                            $('#social-steam').show().attr('href', 'https://steamcommunity.com/profiles/' + res.response.profile.steamID);
                            $('#social-steam span').text(res.response.profile.steamName);
                        }
                        // Hide 'Other' Social Media (for now)
                        $('#social-other').hide();

                        // Profile Badges
                        $('#badges').html('');
                        if(res.response.profile.tdbStaff == true){
                            $('#badges').append('<span class="badge" style="background: #fc7900; color: #fff;">TruckersDB Staff</span>')
                        }
                        if(res.response.profile.betaTester == true){
                            $('#badges').append('<span class="badge" style="background: #f0b70c; color: #fff;">#TDBv5 Tester</span>');
                        }
                        
                        // Owned Games / Hours Played
                        var stats = res.response.profile.statistics;
                        if(stats.ownsATS == true){
                            $('#ownedATS').css('filter', 'none');
							if(stats.hoursPlayedATS == 1){
								$('#ownedATS span').text(stats.hoursPlayedATS + ' HOUR');
							} else{
								$('#ownedATS span').text(stats.hoursPlayedATS + ' HOURS');
							}
                        }
                        if(stats.ownsETS2 == true){
                            $('#ownedETS2').css('filter', 'none');
							if(stats.hoursPlayedETS2 == 1){
								$('#ownedETS2 span').text(stats.hoursPlayedETS2 + ' HOUR');
							} else{
								$('#ownedETS2 span').text(stats.hoursPlayedETS2 + ' HOURS');
							}
                        }
                        var totalHours = stats.hoursPlayedATS + stats.hoursPlayedETS2;
                        $('#statsHoursPlayed').html(totalHours + '<small> HRS</small>');

                        // Get Achievements
                        $.ajax({
                            url: 'https://api.truckersdb.net/v3/user/userAchievements.php',
                            type: 'POST',
                            data: {
                                userID: <?php echo($user); ?>
                            },
                            success: function(res){
                                if(res.status == 1 && res.response.achievementCount > 0){
                                    $('.achievement-count').text(res.response.achievementCount);
                                    $('#no-achievements').hide();
                                    $('#viewAllAchievements').show();
                                    res.response.achievements.forEach(function(achievement, index){
                                        var dateAchieved = formatTimestamp(achievement.dateAchieved);
                                        
                                        $('#achievements').html('');

                                        if(index < 3){
                                            $('#achievements').append('<div class="achievement" title="Achieved on ' + dateAchieved.day + ' ' + dateAchieved.month + ' ' + dateAchieved.year + '"><img draggable="false" class="achievementIcon" src="' + achievement.achievementIcon + '"><span class="achievementTitle">' + achievement.achievementTitle + '</span><span class="achievementSummary">' + achievement.achievementSummary + '!</span></div>');
                                        }

                                        $('#allAchievements').html('');
                                        
                                        $('#allAchievements').append('<div class="achievement"><img draggable="false" class="achievementIcon" src="' + achievement.achievementIcon + '"><span class="achievementTitle">' + achievement.achievementTitle + '</span><span class="achievementSummary">' + achievement.achievementSummary + '!</span><span class="dateAchieved">Achieved on ' + dateAchieved.day + ' ' + dateAchieved.month + ' ' + dateAchieved.year + '</span></div>');
                                    });
                                    $('.achievement').tooltip();
                                }
                            }
                        });
                        
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
        }
    </script>
</body>
</html>