<?php
header("Cache-Control: no-cache");
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo($pageTitle); ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/<?php echo($pageName); ?>.css">
	<link rel="icon" href="./assets/img/icon.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.css"/><script src="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.js" defer></script><script>window.addEventListener("load", function(){window.wpcc.init({"colors":{"popup":{"background":"#222222","text":"#ffffff","border":"#222222"},"button":{"background":"#fc7900","text":"#000000"}},"position":"bottom","padding":"none","corners":"small","margin":"large","transparency":"10"})});</script>
    
    <meta property="description" content="The all-in-one platform for both drivers and VTCs. Making VTC life easier." />
    
    <meta name="twitter:card" content="summary" />
    <meta property="og:url" content="<?php echo("https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"); ?>" />
    <meta property="og:title" content="<?php echo($pageTitle); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="The all-in-one platform for both drivers and VTCs. Making VTC life easier." />
    <meta property="og:image" content="https://truckersdb.net/assets/img/orange-icon.png" />
    <meta name="theme-color" content="#FC7900">
</head>