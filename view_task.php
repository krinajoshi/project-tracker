<script>
// JavaScript popup window function
	function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
	}

</script>


<?php
include "header.php";
//echo $myusername;
?>
<form method="post" action="#">
TASK STATUS:
<select name="status" required>
<option name="all" value="all">All</option>

<option name="unknown" value="unknown"  <?php if($_POST['status'] == 'unknown'): ?> selected="selected" <?php endif ?> >Unknown</option>

<option name="open" value="open" <?php if($_POST['status'] == 'open'): ?> selected="selected" <?php endif ?>>Open</option>



<option name="onhold" value="onhold" <?php if($_POST['status'] == 'onhold'): ?> selected="selected" <?php endif ?>>OnHold</option>



<option name="closed" value="closed" <?php if($_POST['status'] == 'closed'): ?> selected="selected" <?php endif ?>>Closed</option>



<option name="cancelled" value="cancelled" <?php if($_POST['status'] == 'cancelled'): ?> selected="selected" <?php endif ?>>Cancelled</option>

<option name="completed" value="completed" <?php if($_POST['status'] == 'completed'): ?> selected="selected" <?php endif ?>>Completed</option>

</select>
ASSIGNED TO:
<select name="id" id="id" style="width:160px;"  >
			
        <option value= "" >All</option>
			
<?php
$query=mysql_query("select * from admin order by first_name");

while($row = mysql_fetch_array($query))
{
	$id=$row['id'];
echo '<option value="'.$row['id'].'">' . $row['first_name'] . '</option>'; 
    
   }

?>
</select>
<input type="submit">
</form>
<?
echo "<FONT COLOR='RED'><b>CLICK ON THE TASK DESCRIPTION TO VIEW WHOLE TASK</b></FONT>";

 $post=$_POST['status'];
// echo $_POST['id'];
$find_assignment=mysql_query("select role_of_admin from admin where id='".$student_id."' ");
$assigned_to=mysql_fetch_array($find_assignment);
$role_of_admin=$assigned_to['role_of_admin'];


if($_POST['status']=="open" && $_POST['id'])
{
	//echo $_POST['status'];
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.assigned_to = ".$_POST['id']."
AND c.status LIKE  '%open%'
GROUP BY c.task_id
ORDER BY task_id DESC ";
}

else if($_POST['status']=="open")
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.status LIKE  '%open%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}

else if ($_POST['status']=="unknown")
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.status LIKE  '%unknown%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}

else if ($_POST['status']=="unknown" && $_POST['id'])
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.assigned_to = ".$_POST['id']."
AND c.status LIKE  '%unknown%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}

else if ($_POST['status']=="closed")
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.status LIKE  '%closed%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}


else if ($_POST['status']=="closed" && $_POST['id'])
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id

AND c.assigned_to = ".$_POST['id']."
AND c.status LIKE  '%closed%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}


else if ($_POST['status']=="cancelled")
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.status LIKE  '%cancelled%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}

else if ($_POST['status']=="cancelled" && $_POST['id'])
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.assigned_to = ".$_POST['id']."
AND c.status LIKE  '%cancelled%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}

else if ($_POST['status']=="completed")
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id
AND c.status LIKE  '%completed%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}

else if ($_POST['status']=="completed" && $_POST['id'])
{
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location, c.priority, c.status, c.task_type, c.end_date, c.created_by, c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id

AND c.assigned_to = ".$_POST['id']."
AND c.status LIKE  '%completed%'
GROUP BY c.task_id
ORDER BY task_id DESC ";

}

else if ($_POST['status']=="all" && $_POST['id'])
{
$sql="SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location,c.priority, c.status, c.task_type, c.end_date,c.created_by,c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id 
AND c.assigned_to = ".$_POST['id']."
GROUP BY c.task_id 
ORDER BY task_id DESC" ;	
}



else 
{

$sql="SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location,c.priority, c.status, c.task_type, c.end_date,c.created_by,c.assigned_by
FROM project b, tasks c, admin a
WHERE b.project_id = c.project_id
AND c.assigned_to = a.id 
GROUP BY c.task_id 
ORDER BY task_id DESC" ;	
}
$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Project Name</th>
<th>Task Assigned</th>
<th>Task Assigned To</th>
<th>Task Assigned By</th>

<th bgcolor=#00FF00>Task Priority</th>
<th>Task Status</th>
<th>Task Type</th>

<th>End Date</th>
<th>Comments</th>

<th>File Attached</th>

<th>Update</th>
</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
	$task_id=$row['task_id'];
    echo "<td>" . $row['project_name'] . "</td>";
    
	echo '<td>';
	$description=$row['description'];
	$show_desc = implode(' ', array_slice(explode(' ', $description), 0, 10));
	echo '<a href="view_full_task.php?id='.$task_id.'" onclick="basicPopup(this.href);return false"><font color="blue">'.$show_desc.'</font></a>';
	echo '</td>';
	//echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    
	$created_by=strtolower($row['created_by']);
	$assigned_by=strtolower($row['assigned_by']);
	$first_name=strtolower($row['first_name']);
	echo "<td>";
	if($created_by == $first_name)
	{
	 echo  $row['assigned_by'];
    }
	else
	{
		echo $created_by;
	//echo  $row['assigned_by'];
    
	}
	echo "</td>";
	echo "<td bgcolor=#00FF00>" . $row['priority'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>" . $row['task_type'] . "</td>";
    
	echo "<td>" . $row['end_date'] . "</td>";
	echo "<td>";
	$inquiry= view_comments($task_id);
	echo $inquiry[0];
	echo "<br>";
	echo $inquiry[1];
	echo "<br>";
	echo $inquiry[2];
	
echo "</td>";
if($row['file_location']=="")
{

echo "<td>";
echo "</td>";	
}
else
{
echo "<td>";
?>
<a href="uploads/<? echo $row['file_location']?>" target="new">VIEW FILE</a>
<?php
echo "</td>";
}
?>
<TD bgcolor="#00FF00">

<?php
echo"<a href='statusupdate.php?taskid=$task_id'>";
?> 
<font>

Update
</font>
</a>
</td>

<?
	echo "</tr>";
}


echo "</table>";
function view_comments($tid)
{
	$select=mysql_query("select * from comments where task_id='$tid'");
while($rows=mysql_fetch_array($select))
{
	return array($rows['comment'],$rows['commented_by'],$rows['created_on']);
}
}

include "footer.php";
?>