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

$studentID;
$teacherID;

if(isset($data)){
	$request=json_decode($data,true);
	$studentID = $request["studentID"];
	$teacherID = $request["teacherID"];
}

//Turn to readable string
$studentID = mysqli_real_escape_string($con,$studentID);
$teacherID  = mysqli_real_escape_string($con,$teacherID );
//strip slashes of string
$studentID=stripslashes($studentID);
$teacherID =stripslashes($teacherID );

$sql = "SELECT * FROM msgdata WHERE (SenderID='$studentID' AND ReceiverID='$teacherID') OR (ReceiverID='$studentID' AND SenderID='$teacherID')";
$result = mysqli_query($con,$sql);
$entries=[];
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	array_push($entries, $row);
}
$response = [];
if(sizeof($entries) > 0){
	$response[0] = "Got messages!";
	$response = $entries;
}
else{
	$response = "There are no messages";
	
}

echo json_encode($response);
?>
