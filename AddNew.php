
<?php
include "header.php";
?>
<form>
<table>
	<tr>
		<td>
			Question
		</td>
		<td>
			
			<textarea rows="4" cols="50" name="question" required ></textarea>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="Submit" Name="Add New" Value="Add" />
		</td>
	</tr>
</table>

</form>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
<?php

$id = $_SESSION['id'];
if(isset($_REQUEST['question']))
{
	
	$q = $_REQUEST['question'];
	
	
	$query = "insert into question (u_id,question,datetime) values($id,'$q',CURRENT_TIMESTAMP)";
	//echo $query;
	if(mysql_query($query))
	{
		  echo "<script>
		  alert('New Question inserted...');
		  </script>";
		  //header('location:Questions.php');
	}
	else
	{
		echo "Something Wrong";
	}
	
	
	
}
?>

 <?php
   include "footer.php";
   ?>