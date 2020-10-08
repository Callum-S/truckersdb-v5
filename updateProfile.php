<?php
session_start();
$_SESSION['displayName'] = urldecode($_REQUEST['displayName']);

$returnURL = urldecode($_REQUEST['return']);
header('Location: '.$returnURL);
?>