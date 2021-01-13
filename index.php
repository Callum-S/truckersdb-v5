<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to TruckersDB | Everything you need in one place.</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
	<link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.css"/><script src="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.js" defer></script><script>window.addEventListener("load", function(){window.wpcc.init({"colors":{"popup":{"background":"#222222","text":"#ffffff","border":"#222222"},"button":{"background":"#fc7900","text":"#000000"}},"position":"bottom","padding":"none","corners":"small","margin":"large","transparency":"10"})});</script>
</head>
<body>
    <?php require_once("assets/common/navigation.php"); ?>
    
    <div class="hero">
		<div class="overlay">
			<div class="hero-txt">
				<h1>Welcome to <span class="highlight">TruckersDB</span></h1>
				<h4>Everything you need in one place.</h4>
			</div>
		</div>
    </div>
    
    <div class="container">
		<h2>Latest News &amp; Updates</h2>
		<div id="latestUpdates" class="row">
			<div class="card col-lg">
			  <div class="card-body">
				<h5 class="card-title">This might be cool!</h5><span class="text-muted timestamp">08:43 UTC - 29 August 2020</span><br>
				<p class="card-text" style="margin-top: 5px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dui purus, sollicitudin in pharetra in, scelerisque sed metus. Maecenas erat mauris, tincidunt vehicula enim sit amet, finibus pharetra ex. Proin sit amet felis auctor, feugiat est quis non. [...]

	</p>
				<a href="#" class="btn btn-block btn-orange">Read More</a>
			  </div>
			</div><br>
			<div class="card col-lg">
			  <div class="card-body">
				<h5 class="card-title">This might be cool!</h5><span class="text-muted timestamp">08:43 UTC - 29 August 2020</span><br>
				<p class="card-text" style="margin-top: 5px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dui purus, sollicitudin in pharetra in, scelerisque sed metus. Maecenas erat mauris, tincidunt vehicula enim sit amet, finibus pharetra ex. Proin sit amet felis auctor, feugiat est quis non. [...]

	</p>
				<a href="#" class="btn btn-block btn-orange">Read More</a>
			  </div>
			</div><br>
			<div class="card col-lg">
			  <div class="card-body">
				<h5 class="card-title">This might be cool!</h5><span class="text-muted timestamp">08:43 UTC - 29 August 2020</span><br>
				<p class="card-text" style="margin-top: 5px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dui purus, sollicitudin in pharetra in, scelerisque sed metus. Maecenas erat mauris, tincidunt vehicula enim sit amet, finibus pharetra ex. Proin sit amet felis auctor, feugiat est quis non. [...]

	</p>
				<a href="#" class="btn btn-block btn-orange">Read More</a>
			  </div>
			</div>
		</div>
		<div id="about">
			<h2>What is TruckersDB?</h2>
			<p>TruckersDB is the all-in-one solution for VTCs, drivers and event organizers to manage everything trucking. From advertising and applications to job logging and leaderboards, we've got you covered. It's never been easier to join a company that suits you - or set up your own! With a huge variety of tools and features for everyone, including almost full customization across the entire platform, our aim is to cut the stress and time spent on simple day-to-day tasks, allowing you to get on with the big things.</p>
			<p>If you're reading this, welcome. Thank you for being a part of the team working to shape this platform into the perfect system for the community. We have a massive amount of features to include, and even more ideas for the future. As you can see, great progress has been made, but we have a long way to go, and we couldn't do it without you. &#10084; Keep an eye on this site and make sure to watch out for updates in <a href="https://discord.truckersdb.net">our Discord server</a>!</p>
		</div>
    </div>
    
    <?php require_once("./assets/common/footer.php"); ?>
    
    <?php require_once("./assets/scripts/js-includes.php"); ?>
</body>
</html>