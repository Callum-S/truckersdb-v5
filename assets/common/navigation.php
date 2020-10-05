	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="https://v5.truckersdb.net">
        <i class="fas fa-truck"></i> &nbsp; TruckersDB
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Events Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Leaderboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News &amp; Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
				<?php if ( isset($_SESSION['userID']) && $_SESSION['userID'] != '' ) { ?>
                <li class="nav-item dropdown profile-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span id="profileImage" style="background: url('assets/img/default-user.png') no-repeat center;"></span> &nbsp; Beta Tester <?php echo($_SESSION['userID']); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <a href="logout.php" id="logoutButton"><i class="fas fa-sign-out-alt highlight"></i></a>
					   <!--<a href="#" id="notifButton"><i class="far fa-bell highlight"></i></a>-->
                       <h5>Hello, <span class="highlight">Beta Tester <?php echo($_SESSION['userID']); ?></span>!</h5>
                        <div class="row">
                            <div class="col">
                                <h6 class="dropdown-header">Your Account</h6>
                                <a class="dropdown-item" href="#"><i class="fas fa-tachometer-alt highlight"></i>&nbsp; Your Dashboard</a>
                                <a class="dropdown-item" href="profile.php"><i class="far fa-address-card highlight"></i>&nbsp; View Profile</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-user-cog highlight"></i>&nbsp; Account Settings</a>
                                <a class="dropdown-item" href="#"><i class="far fa-life-ring highlight"></i>&nbsp; Support</a>
                            </div>
                            <div class="col dropdown-divider-vertical">
                                <h6 class="dropdown-header">Your Company</h6>
								<?php if ( isset($_SESSION['companyID']) && $_SESSION['companyID'] != '' && $_SESSION['companyID'] != 0 ) { ?>
                                <a class="dropdown-item" href="#"><i class="fas fa-chart-line highlight"></i>&nbsp; Company Dashboard</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-calendar-alt highlight"></i>&nbsp; Company Events</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-dolly highlight"></i>&nbsp; Submit a Job</a>
								<a class="dropdown-item" href="#"><i class="fas fa-download highlight"></i>&nbsp; Downloads</a>
								<?php } ?>
								<?php if ( (isset($_SESSION['perms']['company_manage']) && $_SESSION['perms']['company_manage'] == 1) || (isset($_SESSION['perms']['company_owner']) && $_SESSION['perms']['company_owner'] == 1) ) { ?>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs highlight"></i>&nbsp; Company Settings</a>
								<a class="dropdown-item" href="#"><i class="fas fa-id-card highlight"></i>&nbsp; View Company Profile</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-clipboard-check highlight"></i>&nbsp; Manage Applications</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-plus-square highlight"></i>&nbsp; Additional Features</a>
								<?php } else { ?>
								<a class="dropdown-item" href="#"><i class="fas fa-calendar-alt highlight"></i> Create a Company</a>
								<?php } ?>
                            </div>
                        </div>
                        <?php if ( (isset($_SESSION['perms']['tdb_staff']) && $_SESSION['perms']['tdb_staff'] == 1) ) { ?>
						<div class="staff-menu">
                            <h6 class="dropdown-header">Staff Menu</h6>
                            <a class="dropdown-item" href="#">User Management</a>
                            <a class="dropdown-item" href="#">Support Tickets</a>
                            <a class="dropdown-item" href="#">Company Management</a>
                            <a class="dropdown-item" href="#">Twitter Management</a>
                            <a class="dropdown-item" href="#">Staff Management</a>
                            <a class="dropdown-item" href="#">Site Settings</a>
                        </div>
						<?php } ?>
                    </div>
                </li>
				<?php } else { ?>
				<li class="nav-item dropdown login-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Login to TruckersDB
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <h5>Login to <span class="highlight">TruckersDB</span></h5>
                        <form id="loginForm">
							<div class="form-group">
								<label for="loginUser">Username/Email Address</label>
								<input type="text" class="form-control" id="loginUser" required>
							</div>
							<div class="form-group">
								<label for="loginPass">Password</label>
								<input type="password" class="form-control" id="loginPass" required minlength="8" maxlength="20">
                                <button type="button" class="btn btn-sm passwordEye" data-input="loginPass"><i class="fas fa-eye"></i></button>
							</div>
							<button type="submit" class="btn btn-orange btn-block" id="loginBtn" style="position: relative;">
								<span class="spinner-border text-light" id="loginSpinner" role="status" aria-hidden="true" style="position: absolute; left: 15px; top: 10px; height: 20px; width: 20px;"></span>
								Login
							</button>
							<button class="text-muted" id="forgotPwd" data-toggle="modal" data-target="#forgotPwdModal" type="button" onclick="$('#forgotPwdModal').modal('show');"><em>Forgotten your password?</em></button><br>
							<a href="signup.php" class="btn btn-sm btn-outline-orange" id="registerBtn">Create an Account</a>
						</form>
						<span id="loginErr"> &nbsp; </span>
                    </div>
                </li>
				<?php } ?>
            </ul>
        </div>
    </nav>

<div class="modal fade" id="forgotPwdModal" tabindex="-1" role="dialog" aria-labelledby="forgotPwd" aria-hidden="true">
  <div class="modal-dialog" role="document">
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