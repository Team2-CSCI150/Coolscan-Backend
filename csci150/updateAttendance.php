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
$class;

if(isset($data))
{
	$request = json_decode($data,true);
	$studentID = $request["studentID"];
  $class = $request["classID"];
}

//Turn to readable string
$studentID = mysqli_real_escape_string($con,$studentID);
$class = mysqli_real_escape_string($con,$class);

//strip slashes of string
$studentID=stripslashes($studentID);
$class=stripslashes($class);

//Update attendance entry (assumes that an entry already exists)
$sql = "UPDATE entries SET MaxScore=MaxScore+1, Attempted=Attempted+1 WHERE AssignName='Attendance' AND StudentID='$studentID' AND ClassID='$class'";

//Query from database
$result = mysqli_query($con,$sql);

//Get new grade
$sql = "SELECT MaxScore,Attempted FROM entries WHERE AssignName='Attendance' AND StudentID='$studentID' AND ClassID='$class'";
$result = mysqli_query($con,$sql);
$response = [];
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	array_push($response, $row);
}

echo json_encode($response);
?>
