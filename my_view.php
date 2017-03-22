<script type="text/javascript">
function validation()
{
	
	var mess=document.comment.message.value;
	var mess1=document.getElementById('tmessageid');
	if(mess=="")
	{
		document.comment.message.focus();
		mess1.style.borderColor="#f00";
		return false;
	}
}
</script>
<?php
include "header.php";
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

<input type="submit">
</form>
<FONT COLOR='RED'><b>CLICK ON THE TASK DESCRIPTION TO VIEW WHOLE TASK</b></FONT>

<?
$find_assignment=mysql_query("select role_of_admin from admin where id='".$student_id."' ");
$assigned_to=mysql_fetch_array($find_assignment);
$role_of_admin=$assigned_to['role_of_admin'];
/*
$sql="SELECT a.id,b.project_name,c.description,c.task_id,c.file_location,c.priority,c.status,c.task_type,c.end_date,d.comment FROM project b,tasks c,admin a,comments d 
WHERE b.project_id = c.project_id
AND a.id =  '".$student_id."'
AND  b.assigned_to='".$role_of_admin."' and a.first_name='".$myusername."'
GROUP BY c.task_id 
ORDER BY c.created_on DESC";
*/
if($_POST['status']=="open")
{
$sql="select * from tasks where assigned_to LIKE '%".$student_id."%' AND status='open' ORDER BY task_id DESC";
}
else if($_POST['status']=="closed")
{
$sql="select * from tasks where assigned_to LIKE '%".$student_id."%' AND status='closed' ORDER BY task_id DESC";
}
else if($_POST['status']=="completed")
{
$sql="select * from tasks where assigned_to LIKE '%".$student_id."%' AND status='completed' ORDER BY task_id DESC";
}
else if($_POST['status']=="onhold")
{
$sql="select * from tasks where assigned_to LIKE '%".$student_id."%' AND status='onhold' ORDER BY task_id DESC";
}
else if($_POST['status']=="unknown")
{
$sql="select * from tasks where assigned_to LIKE '%".$student_id."%' AND status='unknown' ORDER BY task_id DESC";
}
else if($_POST['status']=="all")
{
$sql="select * from tasks where assigned_to LIKE '%".$student_id."%'  ORDER BY task_id DESC";
}
else
{
$sql="select * from tasks where assigned_to LIKE '%".$student_id."%'  ORDER BY task_id DESC";
}

//echo $sql;
$result = mysql_query($sql);

?>
						<script>
// JavaScript popup window function
	function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
	}

</script>

<table border='1'>

<tr>
<th>Project</th>
<th>Task Assigned To Me</th>
<th bgcolor=#00FF00>Priority</th>
<th>Status</th>
<th>Task Type</th>
<th>End Date</th>
<th >Comments</th>
<th>Add Comments</th>
<th>File Attached</th>

<th>Update Task Status</th>
</tr><?php
$post=$_POST['status'];

while($row = mysql_fetch_array($result)) 
{
	$task_id=$row['task_id'];
    echo "<tr>";
	$project_id = $row['project_id'];
	$project_name=project_name($project_id);
    echo "<td>" . $project_name . "</td>";


	echo '<td>';
	$description=$row['description'];
	$show_desc = implode(' ', array_slice(explode(' ', $description), 0, 10));
	echo '<a href="view_full_task.php?id='.$task_id.'" onclick="basicPopup(this.href);return false"><font color="blue">'.$show_desc.'</font></a>';
	echo '</td>';
//    echo "<td>" . $row['description'] . "</td>";
    echo "<td bgcolor=#00FF00>" . $row['priority'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>" . $row['task_type'] . "</td>";
    
	echo "<td>" . $row['end_date'] . "</td>";
	
echo "<td align='center' style='word-wrap: break-word'>";
	if( $row['comment'] == "")
	{
	$inquiry= view_comments($task_id);
	echo $inquiry[0];
	echo "<br>";
	echo $inquiry[1];
	echo "<br>";
	echo $inquiry[2];
	}

echo "</td>";

echo "<td align='center'>";
	$inquiry1= add_comments($task_id);
	echo $inquiry1;
echo "</td>";
	
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
echo"<a href='statusupdate_dev.php?taskid=$task_id'>";
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
$select=mysql_query("select * from comments where task_id='".$tid."' ORDER BY comment_id DESC");
while($rows=mysql_fetch_array($select))
{
	return array($rows['comment'],$rows['commented_by'],$rows['created_on']);
}
}

function add_comments($tid)
{
	?>
	
<form name="comment" method="post" action="comment.php" onSubmit="return validation()">
	<input type="hidden" name="task_id" value=<?php echo $tid;?>>
<textarea name="message" id="tmessageid"  style=" width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;"></textarea>
  <input type="submit" name="submit" id="submit" value="Comment">
</form>
	<?
}

function project_name($pid)
{
	$query=mysql_query("select * from project where project_id=' ".$pid." '  ");
	$pname=mysql_fetch_array($query);
	$project=$pname['project_name'];
	return $project;
}
include "footer.php";
?>
