<?php
include "header.php";
$task_id=$_GET['id'];
		$sql = "SELECT note FROM comments WHERE task_id = '".$task_id."' " ;

		$res = mysql_query($sql);

	$row =  mysql_fetch_array($res);

	$note= $row['comment']; 
	

$_SESSION['id'] = $task_id;

?>

<BR>
<BR>
	<form action="update_comments.php" method="post" enctype="multipart/form-data">
<table>
	<tr>
	<td>
		Comment
	</td>
	<td>
		<textarea name="comment" rows="6" cols="50">
		</textarea>
	</td>
</tr>
<tr>
	<td>Your Name
	</td>
	<td>
	<input type="text" name="comment_added_by" id="comment_added_by" value="<?php echo $myusername; ?>">
	</td>
</tr>
<tr>
	<td>
    		<input type="submit" value="SUBMIT" name="submit">
    	</td>
    	
</tr>

</form>
    
    </table>


