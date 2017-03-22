<?php
include "header.php";
if 
(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//echo	 $student_id= $_SESSION['abc'];
//echo	 $mypassword=$_SESSION['mypassword'];
$show_projects=mysql_query("select * from project");
//$project_name=mysql_fetch_array($show_projects);
?>

<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getnames.php?q="+str,true);
  xmlhttp.send();
}


</script>
</head>
<form action="task_added.php" method="POST" enctype="multipart/form-data">	
	<h3><b>Add Task:</b></h3>
	<table>
					<tr>
					<td><b>Select Project:<font color="red">*</font></b></td><td>
					<select name="project_id"  onchange="showUser(this.value)" >
					
            		<?php
					while($project_name=mysql_fetch_array($show_projects))
					{
						$pnames=$project_name['project_name'];
						$project_id=$project_name['project_id'];
						?>
						<option name="pnames" value="<?php echo $project_id; ?>" required><?php echo $pnames; ?></option>
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
	<tr>
	
	<?php
$search="SELECT * from users ";
$search1=mysql_query($search);

?>
				<!--	<td><b>Assign to:<font color="red">*</font></b></td><td>
					<select name="assigned_to">

<option selected="selected">SELECT</option>
<?php
/*
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
*/
?>

</select>
-->

<tr>
	<td>
		Select user name:
	</td>

	<td>
	
<div id="txtHint"><b>User info will be listed here.</b></div>
		 
	
	</td>
</tr>
<font color="red">

<?php
print $_SESSION['ferror'];
$_SESSION['ferror' ]=' ';
?>
</font></td></tr>


	<tr>
					<td><b>Label:<font color="red">*</font></b></td><td>
					<select name="task_type">
<option name="task" value="task">Task</option>
<option name="change" value="change">Change</option>


<option name="bug" value="bug">Bug</option>

<option name="idea" value="idea">Idea</option>

<option name="quote" value="quote">Quote</option>


<option name="issue" value="issue">Issue</option>

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
<font color="red"></font></b></td>
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
<font color="red"></font></b></td>
<td>
<select name="status">

<option name="unknown" value="unknown">Unknown</option>
<option name="open" value="open">Open</option>

<option name="onhold" value="onhold">OnHold</option>

<option name="closed" value="closed">Closed</option>

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

<tr>
<td>
Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
 
</td>
</tr>	

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