<?php
include "dbconnect.php";
include "header.php";


//$query=mysql_query('SELECT * FROM  `users` WHERE  `user_type` !=  "admin"');
$query=mysql_query('SELECT * FROM  `users` WHERE  `user_type` =  "developer"');

while($find_role=mysql_fetch_array($query)
)
{
	$id=$find_role['user_id'];
	echo $id;
	echo "<br>";
$get_admin=get_admin($id);
}

function get_admin($id)
{
	$sql=mysql_query("select * from admin where role_of_admin='$id' ");
	while($sql1=mysql_fetch_array($sql))
	{
		echo $first_name=$sql1['first_name'];
		echo $email=$sql1['email'];
$to      = $email;
$subject = 'Remainder:Update Work Done';

$message ="Hi ".$first_name." ,";
$message .= "\r\n";
$message .= "  ";

$message .= ".\r\n";
$message .= "=============================================";
$message .= ".\r\n";
$message .= "Its time to update the work you did this hour.Kindly update it.If you fail to update workdone your payroll would be blocked";


$message .= ".\r\n";
$message .= "=============================================";
$message .= ".\r\n";
$message .= "To update goto following link:";
$message .= ".\r\n";
$message .= "http://projecttracker.ccbst.info/";


$headers = 'From: pmtool@ccbst.info' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

    //$ret = mail($to, $subject, $message, $headers);

		
	}
}


?>