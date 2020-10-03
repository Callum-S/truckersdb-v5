<?php

session_start();
header("Content-Type: application/json");
$response = array();

if ( $_SERVER['REQUEST_METHOD'] == "POST" )
{
	if ( isset($_POST['userID']) && $_POST['userID'] != '' )
	{
		$userID = $_POST['userID'];
		if ( isset($_POST['lang']) && $_POST['lang'] != '' )
		{
			$lang = $_POST['lang'];
		}
		else
		{
			$lang = 'en';
		}
		if ( isset($_POST['perms']) && $_POST['perms'] != '' )
		{
			$perms = $_POST['perms'];
			$_SESSION['userID'] = $userID;
			$_SESSION['lang'] = $lang;
			$_SESSION['perms'] = $perms;
			$_SESSION['companyID'] = $_POST['companyID'];
			$response = array("status" => 1, "response" => array("userID" => $userID, "message" => "Login successful!"));
		}
		else
		{
			$response = array("status" => 0, "error" => "Unable to login - contact support.");
		}
	}
	else
	{
		$response = array("status" => 0, "error" => "Invalid user!");
	}
}
else
{
	$response = array("status" => 0, "error" => "Method Not Allowed");
}

echo(json_encode($response));

?>