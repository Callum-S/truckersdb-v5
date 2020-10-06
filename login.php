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
		if ( isset($_POST['tdbStaff']) && $_POST['tdbStaff'] != '' )
		{
			$_SESSION['userID'] = $userID;
			$_SESSION['lang'] = $lang;
            $_SESSION['displayName'] = $_POST['displayName'];
			$_SESSION['tdbStaff'] = $_POST['tdbStaff'];
			$_SESSION['companyID'] = (isset($_POST['companyID']) && $_POST['companyID'] != '') ? $_POST['companyID'] : 0;
            $_SESSION['canManageCompany'] = (isset($_POST['canManageCompany']) && $_POST['canManageCompany'] != '') ? $_POST['canManageCompany'] : 0;
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