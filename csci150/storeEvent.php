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
$student_id;
$event_name;
$event_desc;
$start_time;
$end_time;

if(isset($data))
{
	$request = json_decode($data,true);
	$student_id = $request["student_id"];
	$event_name = $request["event_name"];
	$event_desc = $request["event_desc"];
	$start_time= $request["start_time"];
	$end_time= $request["end_time"];

}

//Turn to readable string
$student_id = mysqli_real_escape_string($con,$student_id);
$event_name = mysqli_real_escape_string($con,$event_name);
$event_desc = mysqli_real_escape_string($con,$event_desc);
$start_time = mysqli_real_escape_string($con, $start_time);
$end_time = mysqli_real_escape_string($con, $end_time);

//strip slashes of string
$student_id=stripslashes($student_id);
$event_name = stripslashes($event_name);
$event_desc = stripslashes($event_desc);
$start_time = stripslashes($start_time);
$end_time = stripslashes($end_time);

$sql = "INSERT INTO event (student_id,event_name,start_time,end_time,event_desc) VALUES (?,?,?,?,?)";

$response = "";
if($stmt = mysqli_prepare($con, $sql))
{
	mysqli_stmt_bind_param($stmt, "sssss", $student_id,$event_name,$start_time,$end_time,$event_desc);
	if(mysqli_stmt_execute($stmt))
	{
		$response = "Event Stored!";
	}
	else
	{
		$response = "Error Occured".$con->error;
	}
	
}
mysqli_close($link);

echo json_encode($response);
?>