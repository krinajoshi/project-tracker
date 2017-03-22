<?php
include "header.php";
?>
<form>
<br>
<br>
<script>
$(document).ready(function () {
     $('#ch2').click(function () {
         var $this = $(this);
         if ($this.is(':checked')) {
			 $('#time').prop('required',true);
			 $('#time').show();
         } else {
			 $('#time').prop('required',false);
             $('#time').hide()
			 
         }
     }); 
 })
 </script>
<table>
	<tr>
		<td>
			Add New Quiz
		<td>
	</tr>
	<tr>
		<td>
			Quiz Name :
		<td>
		<td>
			<textarea name='name' rows="4" cols="50" required></textarea>
		<td>
	</tr>
	<tr>
		<td>
			Quiz Type :
		<td>
		<td>
			<input type="checkbox" name="ch1" value="1" checked> Quiz<br>
			<input type="checkbox" name="ch2" id="ch2" value="2"> MCQ Examination <input type="text" name="time" id="time" style="display: none;" placeholder="Enter Time in Minutes" />
		<td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" value="Add"/>
		</td>
		<td>
			<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
		</td>
	</tr>
</table>
<?php
if(isset($_REQUEST['name']) == true)
{
	if(isset($_REQUEST['ch1']) == true)
	{
			echo "in php";
			$r = mysql_query("insert into mcq_name (name,flag,datetime) values ('".$_REQUEST['name']."','".$_REQUEST['ch1']."',CURRENT_TIMESTAMP)");
			if($r)
			{
				echo "<script>
					  alert('Quiz inserted...');
					  </script>";
					  //header('location:MCQback.php');
			}
			else
			{
				echo "something wrong";
			}
	}
	if(isset($_REQUEST['ch2']) == true)
	{
			echo "in php";
			$r = mysql_query("insert into mcq_name (name,flag,datetime,time) values ('".$_REQUEST['name']."','".$_REQUEST['ch2']."',CURRENT_TIMESTAMP,'".$_REQUEST['time']."')");
			if($r)
			{
				echo "<script>
					  alert('New MCQ Test inserted...');
					  </script>";
					  //
			}
			else
			{
				echo "something wrong";
			}
	}
	header('location:MCQback.php');
}
?>

</form>

 <?php
   include "footer.php";
   ?>