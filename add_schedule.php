<?php
include "header.php";
if 
(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//echo	 $student_id= $_SESSION['abc'];
//echo	 $mypassword=$_SESSION['mypassword'];
?>
<form action="schedule_added.php" method="POST" enctype="multipart/form-data">	
	<h3><b>Add Project:</b></h3>
	<table>
					<tr>
					<td><b>Enter project name:<font color="red">*</font></b></td><td>
					<input type="text" name="project_name"  id="project_name"
					required>

<font color="red">

<?php
print $_SESSION['ferror'];
$_SESSION['ferror' ]=' ';
?>
</font></td></tr>
	<tr>
	<?php
$search="SELECT * from users ";
$search1=mysql_query($search);

?>

					<td><b>Assign to:<font color="red">*</font></b></td><td>
					<select name="assigned_to">
<?php
while($row = mysql_fetch_array($search1))
{
$user_id=$row['user_id'];
$pname=$row['user_type'];

    ?>
        <option value= <?php echo $user_id;?> >
		<?php echo $pname; ?>  
	

		</option>
		
   <?php
   
}
?>

</select>


<font color="red">

<?php
print $_SESSION['ferror'];
$_SESSION['ferror' ]=' ';
?>
</font></td></tr>

<tr><td><b>Description
<br>:<font color="red">*</font></b></td>
<td>
<textarea  cols='60' rows='10' name="description" id="description" required>
</textarea>
<font color="red">
<?php
	print $_SESSION['terror'];
	$_SESSION['terror']='';
?>
</font>

</td></tr>
<tr><td><b>Priority
<font color="red">*</font></b></td>
<td>
<select name="priority">

<option name="unknown" value="unknown">Unknown</option>
<option name="low" value="low">Low</option>

<option name="medium" value="medium">Medium</option>

<option name="high" value="high">High</option>

<option name="urgent" value="urgent">Urgent</option>
</select>
<font color="red">
<?php
	print $_SESSION['t1error'];
	$_SESSION['t1error']='';
?>
</font>

</td></tr>


<tr><td><b>Status
<font color="red">*</font></b></td>
<td>
<select name="status">

<option name="unknown" value="unknown">Unknown</option>
<option name="open" value="open">Open</option>

<option name="onhold" value="onhold">OnHold</option>

<option name="successsful" value="successsful">Successfully Completed</option>

<option name="cancelled" value="cancelled">Cancelled</option>
</select>
<font color="red">
<?php
	print $_SESSION['t1error'];
	$_SESSION['t1error']='';
?>
</font>

</td></tr>
<tr><td><b>Start Date
<font color="red">*</font></b></td>
<td>
<input type="date" name="start_date" required>
<font color="red">
<?php
	print $_SESSION['t2error'];
	$_SESSION['t2error']='';
?>
</font>

</td></tr>
<tr><td><b> End Date
<font color="red">*</font></b></td>
<td>
<input type="date" name="end_date" required>
<font color="red">
<?php
	print $_SESSION['t3error'];
	$_SESSION['t3error']='';
?>
</font>

<tr><td>
<font color="red">(*) marked fields are compulsary to fill</font>
</tr></td>
					<tr><td><input type="submit" value="SUBMIT">
	</td></tr>
						</table>
</form>
<?php
}
else
{
	echo "Something went Wrong....Please try again later";
}
?>
<?php
include "footer.php";
?>