<?php
include("header.php");
if(isset($_POST['submit']))
{
	$message=$_POST['message'];
	$task_id=$_POST['task_id'];
	
	$task_name=mysql_query("SELECT * FROM `tasks` WHERE `task_id`='$task_id'");
	$row=mysql_fetch_array($task_name);
	$task_names=$row['description'];
	$insert=mysql_query("insert into comments(task_id,commented_by,comment)values('$task_id','$myusername','$message')")or die(mysql_error());
	$query1=mysql_query("INSERT INTO `tickets`(`ticket_id`,`task_id`,`ticket_type`, `created_by`) VALUES ('$task_id','$task_id','Comment-Added','$myusername')");

	//$to="developer@ccbst.ca";
	
	$to="developer@ccbst.ca,kris@ccbst.ca";
	$subject="comment added on pmtool";
	$headers = 'From: pmtool@ccbst.info' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
$messages ="=====================================" ;
$messages .="\r\n" ;
$messages .="Comment Added by: " ;
$messages .= $myusername;
$messages .="\r\n" ;
$messages .="Comment: " ;

$messages .= $message;
$messages .="\r\n" ;
$messages .= "Task was: ";
$messages .= $task_names;
$messages .= "\r\n";
$messages .="Commented On: " ;
$messages .=  date("Y/m/d");
$messages .="\r\n" ;

$messages .="=====================================" ;
$messages .= ".\r\n";
$messages .= "you may also view the entire ticket by visiting:";
$messages .= "http://projecttracker.ccbst.info/";

$messages .= "Your ticket ID is".$task_id;

$ret = mail($to, $subject, $messages, $headers);

	header("Location:my_view.php");

	}
?>