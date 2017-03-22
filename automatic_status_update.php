<?php
include "header.php";

$date = strtotime("-15 day");
$before_15_days = date('Y-m-d', $date);
$sql=mysql_query("SELECT * 
FROM tasks
WHERE temporary_status !=  ''");
while($row=mysql_fetch_array($sql))
{
$task_id=$row[0];	
$admin=$row[1];
$description=$row['description'];
$assigned_to=$row['assigned_to'];
$start_date=$row['start_date'];
$end_date= $row['end_date'];
$priority=$row['priority'];
$assigned_by1=$row['assigned_by'];
$temporary_status=$row['temporary_status'];
$temporary_status_date=$row['temporary_status_date'];

$sql1=mysql_query("update tasks set status='$temporary_status' where temporary_status_date <= '$before_15_days' and task_id='$task_id' ");

}

include "footer.php";
?>