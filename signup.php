<?php
session_start();

if(isset($_SESSION['userID']))
{
    header('Location: https://v5.truckersdb.net');
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up | TruckersDB</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="icon" href="assets/img/icon.png">
</head>
<body>
    <?php require_once("assets/common/navigation.php"); ?>
    
    <div class="container">
		<h2 class="text-center">Create a <span class="highlight">TruckersDB</span> Account</h2>
		<form id="registerForm">
			<div class="row">
				<div class="col-md">
					<label for="regUserName">Choose a Username (This cannot be changed!)<span class="required">*</span></label>
					<input id="regUserName" class="form-control" type="text" maxlength="20">
					<small id="regUserNameHelp" class="form-text text-muted">Less than 20 characters, must be unique and cannot contain spaces.</small>
				</div>
				<div class="col-md">
					<label for="regDisplayName">Display Name (This is what everybody else sees)</label>
					<input id="regDisplayName" class="form-control" type="text" maxlength="20">
					<small id="regDisplayNameHelp" class="form-text text-muted">Less than 20 characters, may contain spaces.</small>
				</div>
			</div>
			<div class="row">
				<div class="col-md">
					<label for="regEmailAddress">Enter your Email Address<span class="required">*</span></label>
					<input id="regEmailAddress" class="form-control" type="email">
					<small id="regEmailAddressHelp" class="form-text text-muted">e.g. hello@truckersdb.net</small>
				</div>
				<div class="col-md">
					<label for="regEmailConfirm">Confirm your Email Address<span class="required">*</span></label>
					<input id="regEmailConfirm" class="form-control" type="email">
					<small id="regEmailConfirmHelp" class="form-text text-muted">e.g. hello@truckersdb.net</small>
				</div>
			</div>
			<div class="row">
				<div class="col-md">
					<label for="regPassword">Choose a Password<span class="required">*</span></label>
					<input id="regPassword" class="form-control" type="password">
					<div id="password-checker">
						Your password should contain at least:
						<ul>
							<li id="pc-chars">8 characters<span class="required">*</span></li>
							<li id="pc-lower">One lowercase letter (a-z)</li>
							<li id="pc-upper">One uppercase letter (A-Z)</li>
							<li id="pc-num">One number (0-9)</li>
						</ul>
						<div id="pc-meter">
							<span id="pc-meter-title">Password Strength: <span id="pc-meter-strength">None</span></span>
							<div id="pc-meter-level">
								<div id="pc-level-low"></div>
								<div id="pc-level-medium"></div>
								<div id="pc-level-high"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md">
					<label for="regPasswordConfirm">Confirm Password<span class="required">*</span></label>
					<input id="regPasswordConfirm" class="form-control" type="password">
					<small id="regPasswordConfirmHelp" class="form-text text-muted">Make sure you copy your password exactly!</small>
					<br>
					<label for="regBirth">Month / Year of Birth<span class="required">*</span></label>
					<input type="month" class="form-control" id="regBirth" min="1970-01" max="2013-12">
					<small id="regBirthHelp" class="form-text text-muted">You must be at least 13 years of age to register. We don't store this information.</small>
				</div>
			</div>
			<div class="row">
				<div class="col-md align-self-center">
					<div id="regErr">
						<h3>Whoops! Something is wrong!</h3>
						<p>Check that all the information you've entered is correct.<br>If the problem persists, contact support.</p>
					</div>
				</div>
				<div class="col-md">
					<div id="regOptIn">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="agreeTerms">
							<label class="form-check-label" for="agreeTerms">I agree to the <a href="#" target="_blank">TruckersDB Terms of Service</a><span class="required">*</span></label>
						</div><br>
							<p><small class="text-muted">We will only use the information provided to create your account and provide you with the services that the TruckersDB platform has to offer. You are free to remove your account or view the data we have stored about your account at any time. <a href="#" target="_blank">Click here to view our Privacy Policy.</a></small></p>
					</div>
				</div>
			</div>
			<div style="text-align: right; margin: 20px 0 0;">
				<span id="regLoading">Creating your account... <span class="spinner-border highlight" id="regSpinner" role="status" aria-hidden="true" style="height: 25px; width: 25px; margin-left: 5px; margin-right: 10px;"></span></span>
				<button type="submit" id="regSubmit" class="btn btn-lg btn-orange">
					Create Account
				</button>
			</div>
		</form>
    </div>
    
    <?php require_once("./assets/common/footer.php"); ?>
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
</body>
</html>