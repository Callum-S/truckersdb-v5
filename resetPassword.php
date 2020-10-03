<?php
session_start();
if( isset($_SESSION['userID']) )
{
	header("Location: https://v5.truckersdb.net");
	die();
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Your Password | TruckersDB</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/resetPassword.css">
	<link rel="icon" href="assets/img/icon.png">
</head>
<body>
	<a href="https://v5.truckersdb.net" id="resetPwdBack" class="btn btn-lg btn-light">&#8592; Back to TruckersDB</a>
	<div id="resetPwdLogo"></div>
    <div id="resetPwdContainer">
		<h2>Reset Your Password</h2>
		<p style="text-align: justify; user-select: none;">Don't worry if you can't remember your password. You can reset it here - just enter your new password below and we'll fix it for you.</p>
		<form id="resetPwd">
				<div class="form-group">
					<label for="password">Choose a new password</label>
					<input type="password" class="form-control" id="password" placeholder="Password" minlength="8" maxlength="64">
				</div>
				<div class="form-group">
					<label for="confirmPassword">Confirm your password</label>
					<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" minlength="8" maxlength="64">
			</div>
			<button type="submit" id="resetSubmit" class="btn btn-lg btn-block btn-orange" style="margin-top: 30px; position: relative;">
				<span class="spinner-border text-light" id="resetSpinner" role="status" aria-hidden="true" style="position: absolute; left: 10px; top: 8px; height: 30px; width: 30px;"></span>
				Change Password
			</button>
		</form>
		<button id="resendBtn" onclick="$('#forgotPwdModal').modal('show');">Having problems? Resend the link.</button>
    </div>
	
	<div id="resetPwdAlert" class="alert alert-success">
		Password changed successfully! You can now <a href="https://v5.truckersdb.net">return to TruckersDB</a> and login.
	</div>
    
	
<div class="modal fade" id="forgotPwdModal" tabindex="-1" role="dialog" aria-labelledby="forgotPwd" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Forgotten your password?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<form id="forgotForm">
      		<div class="modal-body">
        		We'll send you a link to reset your password so that you can continue using your account.<br><br>
				<div class="alert alert-success" id="forgotAlert">
					
				</div>
			  	<div class="form-group">
				  	<label for="forgotEmail">Email Address</label>
				  	<input type="email" class="form-control" id="forgotEmail" required>
			  	</div>
      		</div>
      		<div class="modal-footer">
      			<button type="submit" class="btn btn-orange btn-block" id="forgotSubmit" style="position: relative;">
		  			<span class="spinner-border text-light" id="forgotSpinner" role="status" aria-hidden="true" style="position: absolute; left: 10px; top: 8px; height: 20px; width: 20px;"></span>
		  			Submit
				</button>
      		</div>
		</form>
    </div>
  </div>
</div>
	
	
    <?php require_once("./assets/scripts/js-includes.php"); ?>
	<script>
		$('#resetPwdAlert').hide();
		$('#resetSpinner').hide();
		
		$('#resetSubmit').click(function(e){
			e.preventDefault();
			$('#resetSubmit').attr('disabled', true);
			$('#resetSpinner').show();
			
			const params = new URLSearchParams(window.location.search);
			var key = params.get('key');
			
			if ($('#password').val() == $('#confirmPassword').val()){
				var newPassword = $('#confirmPassword').val();
				if(newPassword.length >= 8 && newPassword.length <= 64){
					if(key != '' && key != null){
						if(key.length == 32){
							$.ajax({
								url: 'https://api.truckersdb.net/v3/user/resetCredentials.php',
								type: 'POST',
								data: {
									key: key,
									newPassword: newPassword
								},
								success: function(res){
									$('#resetSpinner').hide();
									if(res.status == 1){
										// Display success message
										$('#resetSubmit').attr('disabled', false);
										$('#resetSpinner').hide();
										$('#resetPwdAlert').html('<strong>Success!</strong> Password changed successfully. You can now <a href="https://v5.truckersdb.net">return to TruckersDB</a> and login.');
										$('#resetPwdAlert').removeClass('alert-danger').addClass('alert-success').fadeIn();
										setTimeout(function(){$('#resetPwdAlert').fadeOut();}, 3500);
									} else{
										displayError(res.error);
									}
								}
							});
						} else{
							displayError('Invalid password reset key - check your link or send it again.');
						}
					} else{
						displayError('No password reset key found - check your link or send it again.');
					}
				} else{
					displayError('Passwords must be between 8 and 64 characters.');
				}
			} else{
				displayError('Passwords do not match.');
			}
			
			function displayError(errorMsg){
				$('#resetSubmit').attr('disabled', false);
				$('#resetSpinner').hide();
				$('#resetPwdAlert').html("<strong>Hold up!</strong> " + errorMsg);
				$('#resetPwdAlert').removeClass('alert-success').addClass('alert-danger').fadeIn();
				setTimeout(function(){$('#resetPwdAlert').fadeOut();}, 3500);
			}
			
			//Maybe implement password checker from signup page?
		});
	</script>
</body>
</html>