<?php
include "dbconnect.php";

$today= date('Y-m-d');
echo $today;

$message = "Hi,";
$message .= "<br><br>";
$message .= "Followings tasks were assigned to you.It seems that you haven't completed the tasks.Complete these tasks as soon as possible else your payroll would be blocked";
$message .= "<br><br>";


$message .= '<table  border="1" align="center" cellpadding="5" cellspacing="0" style="color:black;font-family:arial,helvetica,sans-serif;">';
$message .= '<tr style="text-align:center;background-color:darkolivegreen;color:lightgoldenrodyellow;">';
$message .= "<th >";
$message .= "ASSIGNED TO";
$message .= "</th>";

$message .= "<th>";

$message .= "TASK";
$message .= "</th>";

$message .= "<th>";

$message .= "STATUS";
$message .= "</th>";

$message .= "<th>";

$message .= "START DATE";
$message .= "</th>";

$message .= "<th>";

$message .= "END DATE";
$message .= "</th>";

$message .= "<th>";
$message .= "ASSIGNED BY";

$message .= "</th>";
$message .= "</tr>";

$query=mysql_query("SELECT * 
FROM  `tasks` 
order by assigned_to DESC
");
$employees ="";
while($row=mysql_fetch_array($query))
{
	$project_id = $row['project_id'];
	$assigned_to = $row['assigned_to'];
	 $employees .= $assigned_to;
	$employees .=",";
 }

 
$employee = explode(',',$employees);
$ext = array_unique($employee);
foreach($ext as $key) {
	
$message1 = $message;

$query5 = mysql_query("SELECT * FROM tasks WHERE assigned_to ='$key' AND end_date <  '".$today."'
AND status != 'completed' 
AND status != 'closed' 
 "); 
while($r = mysql_fetch_array($query5))
{
	
	$assigned_to = $key;
	$description = $r['description'];
	$status= $r['status'];
	$start_date = $r['start_date'];
	$end_date = $r['end_date'];
	$status = $r['status'];
	$assigned_by= $r['assigned_by'];
	$assigned_to_employee = assigned_to($assigned_to);
	
		$message1 .= "<td>";
		$message1 .= $assigned_to_employee[0];
	$message1 .= "</td>";
	
	$message1 .= '<td  style="background-color:lightgoldenrodyellow;">';
		$message1 .= $description;
	$message1 .= "</td>";
	
	$message1 .= "<td>";
		$message1 .= $status;
	$message1 .= "</td>";
	
	$message1 .= "<td>";
		$message1 .= $start_date;
	$message1 .= "</td>";
	
	$message1 .= "<td>";
		$message1 .= $end_date;
	$message1 .= "</td>";
	
	$message1 .= "<td>";
		$message1 .= $assigned_by;
	$message1 .= "</td>";
$message1 .= "</tr>";

}
$message1 .= "</table>";

  	$to = $assigned_to_employee[1];
$headers  = "From:pmtool@ccbst.info\r\n";
$headers .= "Content-type: text/html\r\n";
    
$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
///$headers .= 'Cc: kris@ccbst.ca' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

//	$to .= ',kris@ccbst.ca,developer@ccbst.ca';
	$subject = 'Tasks Pending-Action Would be Taken';

	mail($to,$subject,$message1,$headers);
echo $message1;

}

function assigned_to($id)
{
	$query1 = mysql_query("select * from admin where id='".$id."' ");
	while($row1=mysql_fetch_array($query1))
	{
		$first_name = $row1['first_name'];
		$last_name = $row1['last_name'];
			$name = $first_name." ".$last_name;  
	$email = $row1['email'];
	}
	return array($name,$email);
}
	?>
