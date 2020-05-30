<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">
        <i class="fas fa-truck"></i> &nbsp; TruckersDB
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse VTCs</a>
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
                <li class="nav-item dropdown profile-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> &nbsp; Display Name
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <a href="logout.php" id="logoutButton"><i class="fas fa-sign-out-alt highlight"></i></a>
                       <h5>Hello, <span class="highlight">User</span>!</h5>
                        <div class="row">
                            <div class="col">
                                <h6 class="dropdown-header">User Menu</h6>
                                <a class="dropdown-item" href="#">Your Dashboard</a>
                                <a class="dropdown-item" href="#">View Profile</a>
                                <a class="dropdown-item" href="#">Account Settings</a>
                                <a class="dropdown-item" href="#"><i class="far fa-life-ring highlight"></i> Support</a>
                            </div>
                            <div class="col dropdown-divider-vertical">
                                <h6 class="dropdown-header">Company Menu</h6>
                                <a class="dropdown-item" href="#">VTC Dashboard</a>
                                <a class="dropdown-item" href="#">VTC Calendar</a>
                                <a class="dropdown-item" href="#">Submit a Job</a>
                                <a class="dropdown-item" href="#">Downloads</a>
                            </div>
                        </div>
                        <div class="staff-menu">
                            <h6 class="dropdown-header">Staff Menu</h6>
                            <a class="dropdown-item" href="#">User Management</a>
                            <a class="dropdown-item" href="#">Support Tickets</a>
                            <a class="dropdown-item" href="#">Company Management</a>
                            <a class="dropdown-item" href="#">Twitter Management</a>
                            <a class="dropdown-item" href="#">Staff Management</a>
                            <a class="dropdown-item" href="#">Site Settings</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="hero">
        <div class="row">
            <div class="col">
                <h2>Heading</h2>
                <h4>Subheading text too! You can even add this much text if you really wanted to...</h4>
                <a href="#" class="btn btn-outline-light">Button goes here</a>
            </div>
            <div class="col divider">
                <h2>Heading</h2>
                <h4>Subheading text too!</h4>
                <a href="#" class="btn btn-outline-light">Button goes here</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1 class="text-center">Welcome to <span class="highlight">TruckersDB</span></h1>
        <h4 class="text-center">Everything you need in one place.</h4>
        
        <p class="text-muted">Content goes here.</p>
    </div>
    
    <footer class="footer">
      <div class="container">
        TruckersDB &nbsp; | &nbsp; <a href="#">GDPR/Privacy Notice</a> &nbsp; | &nbsp; <a href="#">Terms of Service</a>
      </div>
    </footer>
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
</body>
</html>