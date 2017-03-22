<?php
include "dbconnect.php";
include "header.php";
$today=date("Y-m-d");

?>
<table border="2" cellspacing="0" cellpadding="0">
<tr>
<th>Employee Name</th>

<th>Total Tasks</th>


<th>Completed Tasks</th>


<th>Complete On Time</th>


<th>Performance</th>
</tr>

<?
$sql=mysql_query("select * from admin");
	
	while($sql1=mysql_fetch_array($sql))
	{
echo "<tr>";	
	$first_name=$sql1['first_name'];
		//echo $email=$sql1['email'];
		$id=$sql1['id'];
		$total_tasks = total_number_tasks($id);
		$total_completed_task = total_completed_task($id);
	$total_on_time = total_on_time($id);
		
	echo "<td>".$first_name;
		echo "</td>";
		
		echo "<td>".$total_tasks;
		echo "</td>";
		
		
		echo "<td>".$total_completed_task;
		echo "</td>";
		
		//echo "<td>".$total_on_time;
		//echo "</td>";
		if($total_tasks != 0)
		{
		$performance=round (($total_completed_task*100)/$total_tasks,2);
		}
		else
		{
			$performance = 0;
		}
		echo "<td>";
		echo "</td>";
		
		echo "<td>".$performance ."%";
		//echo "</td>";
		
		echo "</tr>";	
	
	
	}
	
	function total_number_tasks($id)
	{
		$query=mysql_query("select * from tasks where assigned_to='$id' or assigned_to=' $id' or assigned_to like '%$id%'  ");
		$ml=mysql_num_rows($query);
		return $ml;
	}
	
	
	function total_completed_task($id)
	{
		$query=mysql_query("select * from tasks where assigned_to like '%$id%' AND status like '%completed%' ");
		$ml=mysql_num_rows($query);
		return $ml;
	}


	function total_on_time($id)
	{
	//	$query=mysql_query("select * from tasks where assigned_to='$id' or assigned_to=' $id' or assigned_to like '%$id%' AND status like '%completed%' AND end_date<= '".$today."' ");
		//$ml=mysql_num_rows($query);
		//return $ml;
	}	
	
echo 
'</table>';
include "footer.php";
?>