<?php

$key = $_GET['key'];

//extract data from the post
//set POST variables
$url = 'https://api.truckersdb.net/v3/user/confirmEmail.php';
$fields = array(
	'key' => urlencode($key)
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

$res = json_decode($result);

if ( $res->status == 1 )
{
	// Success!
	echo($res->response->message.' You can now close this page or <a href="https://v5.truckersdb.net">continue to TruckersDB</a>.');
}
else
{
	// Oof...
	echo($res->error.' Please try again later or contact support if the problem persists. You can now close this page.');
}

?>