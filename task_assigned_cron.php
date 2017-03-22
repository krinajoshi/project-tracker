<?php
include "dbconnect.php";
include "header.php";

echo 'Time zone is: '.date('e'); 
echo 'Time zone is: '.date_default_timezone_get(); 
$p1startdate=date("Y-m-d 00:00:00");
echo $p1enddate=date("Y-m-d  23:59:00");

echo $p1startdate;


$query=mysql_query("select * from tasks where created_on >= '".$p1startdate."' and created_on <='".$p1enddate."' ");
//$query=mysql_query("select * from tasks where created_on >= '2015-11-18 00:00:00' and created_on <='2015-11-18 23:59:00' ");
while($row=mysql_fetch_array($query))
{
echo	$project_id=$row['project_id'];
echo	$description=$row['description'];
echo	$start_date=$row['start_date'];
echo	$end_date=$row['end_date
	'];
echo	$assigned_to=$row['assigned_to'];
echo $assgined_email=assgined_email($assigned_to);
echo	$project_name=project_name($project_id);


$to      = $assgined_email;
$subject = 'New Task Assigned To You';

$message ="Hi,";
$message .= "\r\n";
$message .= " New task is added in PM TOOL ";

$message .= ".\r\n";
$message .= "=============================================";
$message .= ".\r\n";

$message .= "Task assigned: ";
$message .= $description;
$message .= "\r\n";

$message .= "Start Date: ";
$message .= $start_date;
$message .= ".\r\n";

$message .= "End Date: ";
$message .= $end_date;
$message .= ".\r\n";

date_default_timezone_set("America/New_York");
$message .= "Task added on: ";

$message .=  date("Y-m-d") ;
//$message .= echo '&nbsp;';
$message .= "  ";

$message .= date("h:i:sa");

$message .= ".\r\n";
$message .= "=============================================";
$message .= ".\r\n";
$message .= "you may also view the entire task by visiting:";
$message .= "http://projecttracker.ccbst.info/";


$headers = 'From: pmtool@ccbst.info' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

$ret = mail($to, $subject, $message, $headers);
echo $message;
}

function project_name($project_id)
{
	$q=mysql_query("select * from project where project_id='".$project_id."' ");
	$r1=mysql_fetch_array($q);
	$name=$r1['project_name'];
	return $name;

}

function assgined_email($admin_id)
{
	$q1=mysql_query("select * from admin where id='".$admin_id."'  ");
	$r2=mysql_fetch_array($q1);
	$email=$r2['email'];
	return $email;
}
?>