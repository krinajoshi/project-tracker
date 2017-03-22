<?php
include "header.php";
?>
<form>
<br>
<br>
<span style="color:red">* Please make sure you Select answer in Given Options below.</span>
<br>
<table>
	<tr>
		<td>
			Add New Question
		</td>
	</tr>
	<tr>
		<td>
			Question :
		</td>
		<td>
			<textarea name='name' rows="4" cols="50" required ></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Options :
		</td>
		<td>
		<table>
			<tr>
				<td>
					<input type="radio" name="ans" value="1" checked> <textarea name='ch1' required></textarea>
				</td>
				<td>
					<input type="radio" name="ans" value="2" > <textarea name='ch2' required></textarea><br>
				</td>
			</tr>
			<tr>
				<td>
					<input type="radio" name="ans" value="3" > <textarea name='ch3' required></textarea>
				</td>
				<td>
					<input type="radio" name="ans" value="4" > <textarea name='ch4' required></textarea>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		
		
		<?php
		$r = mysql_query("select * from mcq_name where flag=1");
		echo "<td><b>Quiz</b><br>";
		while($row = mysql_fetch_assoc($r))
		{
			if($row['flag']==1)
			{
				echo '<input type=checkbox name="c1[]" style=display:inline-block; value='.$row['mcqn_id'].''.
				(isChecked($row['mcqn_id']) ? " checked='checked'" : "").'
				/>'.$row['name'].'<br>';
			}
		}
		echo "</td>";
		echo "<td><b>MCQ Examination</b><br>";
		$r = mysql_query("select * from mcq_name where flag=2");
		while($row1 = mysql_fetch_assoc($r))
		{
			if($row1['flag']==2)
			{
				echo '<input type=checkbox name="c1[]" style=display:inline-block; value='.$row1['mcqn_id'].''.
				(isChecked($row1['mcqn_id']) ? " checked='checked'" : "").'
				/>'.$row1['name'].'<br>';
			}
		}
		echo "</td>";
		function isChecked($id)
		{
			if(isset($_REQUEST['c1']) == true)
			{
				$c = $_REQUEST['c1'];
				if(in_array($id,$c))
				{
					return true;
				}
			}
			return false;
		}
		
		
		?>
		
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" value="Add"/>
			<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
		</td>
		<td>
			
		</td>
	</tr>
</table>
<?php
if(isset($_REQUEST['ans']) == true && isset($_REQUEST['name']) == true && isset($_REQUEST['c1']) == true)
{
$c = $_REQUEST['c1'];
$flag=0;
foreach($c as $val)
{
	
	$q = "insert into mcq_practice (mcqn_id,question,option1,option2,option3,option4,ans,datetime) values
	(".chop($val,'/').",'".$_REQUEST['name']."','".$_REQUEST['ch1']."','".$_REQUEST['ch2']."','".$_REQUEST['ch3']."',
	'".$_REQUEST['ch4']."','".$_REQUEST['ans']."',CURRENT_TIMESTAMP)";
	$r = mysql_query($q);
	
	if(!$r)
	{
		$flag=1;
		echo $q."<br>";
	}
}
if($flag==0)
{
	echo "<script>alert('1 Question Inserted')</script>;";
}
else
{
	echo "something wrong";
}

}
?>

</form>

 <?php
   include "footer.php";
   ?>