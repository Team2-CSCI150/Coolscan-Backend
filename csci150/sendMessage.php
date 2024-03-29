<?php
if(isset($_SERVER['HTTP_ORIGIN']))
{
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400');
}

if($_SERVER['REQUEST_METHOD']=='OPTIONS')
{
	if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		header("Access-Control-Allow-Headers:		{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	exit(0);
}

require "dbconnect.php";
$data = file_get_contents("php://input");

$senderID;
$receiverID;
$msg;
$date;

if(isset($data)){
	$request=json_decode($data,true);
	
	$senderID = $request["senderID"];
	$receiverID = $request["receiverID"];
	$msg = $request["message"];
}

/*$senderID = 200100;
$receiverID = 300100;
$msg = "TEST";*/
date_default_timezone_set("America/Los_Angeles");
$date = date('Y/m/d h:i:s a', time());
echo $date;

//Turn to readable string
$senderID = mysqli_real_escape_string($con,$senderID);
$receiverID  = mysqli_real_escape_string($con,$receiverID);
$msg  = mysqli_real_escape_string($con,$msg);
$date = mysqli_real_escape_string($con,$date);

//strip slashes of string
$senderID=stripslashes($senderID);
$receiverID=stripslashes($receiverID);
$msg=stripslashes($msg);
$date=stripslashes($date);

//$sql = "INSERT INTO `msgdata` (`msg`, `SenderID`, `ReceiverID`, `date`) VALUES ('$msg', '$senderID', '$receiverID', current_timestamp())";
//$result = mysqli_query($con,$sql);

$sql = "INSERT INTO msgdata (`msg`, `SenderID`, `ReceiverID`, `date`) VALUES (?,?,?,?)";

$response = "";

if($stmt = mysqli_prepare($con, $sql))
{
	mysqli_stmt_bind_param($stmt, "ssss", $msg,$senderID,$receiverID,$date);
	if(mysqli_stmt_execute($stmt))
	{
		$response = "Message Sent!";
	}
	else
	{
		$response = "Error Occured".$con->error;
	}
}
mysqli_close($con);
echo json_encode($response);
?>
