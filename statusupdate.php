<?php
include "header.php";
$taskid=$_REQUEST['taskid'];
$sql=mysql_query("select * from tasks where task_id='$taskid'");
while($row=mysql_fetch_array($sql))
{
$admin=$row[1];
$description=$row['description'];
$assigned_to=$row['assigned_to'];
$start_date=$row['start_date'];
$end_date= $row['end_date'];
$priority=$row['priority'];
}

//echo $student_id;
//echo $myusername;
	 
	 $today=date("Y-m-d");


if(isset($_POST['submit']))
{
$newstatus=$_POST['status'];
$admin2=$_POST['pwd'];
$sql=mysql_query("update tasks set status='$newstatus' where task_id='$taskid'");

$to = "developer@ccbst.ca,kris@ccbst.ca";
$subject = $myusername;
$subject .= " updated task status on PM tool";
$message="Hi kris,
";
$message .= "\r\n";

$message .= $myusername;
$message .= " had changed a task status to ";
$message .= $newstatus;
$message .= ".\r\n";


$message .= ".\r\n";
$message .= "=============================================";
$message .= ".\r\n";

$message .= "Task assigned was:";
$message .= $description;
$message .= "\r\n";

$message .= "Start Date: ";
$message .= $start_date;
$message .= ".\r\n";

$message .= "End Date: ";
$message .= $end_date;
$message .= ".\r\n";


$message .= "Task Priority: ";
$message .= $priority;
$message .= ".\r\n";

date_default_timezone_set("America/New_York");
$message .= "Task completed on: ";

$message .=  date("Y-m-d") ;
//$message .= echo '&nbsp;';
$message .= "  ";

$message .= date("h:i:sa");

$message .= ".\r\n";
$message .= "=============================================";

$message .= ".\r\n";
$message .= ".\r\n";
$message .= "Please open following link to view more details:";
$message .= "\r\n";

$message .= "http://projecttracker.ccbst.info/";

$headers = 'From: pmtool@ccbst.info' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to,$subject,$message,$headers);
header('location:view_task.php');

}
?>

<form action="#" enctype="multipart/form-data" method="post">
<table align="center" >
<td> 
SELECT STATUS:
</td>
<td><select name="status">
<option name="open" value="open">Open</option>

<option name="onhold" value="onhold">OnHold</option>

<option name="completed" value="completed">Completed Successfully</option>

<option name="cancelled" value="cancelled">Cancelled</option>

</select>
</td>
</tr>

<tr>
<td colspan="2" align="center"> 
<input type="submit" value="submit" name="submit" />
</td>
</tr>
</form>
</table>

<?php
include "footer.php";
?>