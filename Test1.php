<?php
include "header.php";
?>
<form action="Result.php">
<br>
<br>
<div id="q" name="q">
<table>
	<tr>
		<td>
			Quiz
		</td>
	</tr>
<?php
if(isset($_REQUEST['id']))
{
	echo '<input type="text" name="id" value="'.$_REQUEST['id'].'" hidden=true > ';
	$r = mysql_query("select * from mcq_practice where mcqn_id=".$_REQUEST['id']);
	$arr = array();
	$ans = array();
	$c =1;
	while($val = mysql_fetch_assoc($r))
	{
		$arr[] = $val;
	}
	shuffle($arr);
	foreach($arr as $ra)
	{
			$ans[$ra['mcqp_id']] = $ra['ans'];
	
		echo'	
			<tr>
				<td>
					Question '.$c.' :
				</td>
				<td>
					'.$ra['question'].'
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
				<table>
					<tr>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="1" checked> '.$ra['option1'].'
						</td>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="2" > '.$ra['option2'].'<br>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="3" > '.$ra['option3'].'
						</td>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="4" > '.$ra['option4'].'
						</td>
					</tr>
				</table>
				</td>
			</tr>';
			
			$c++;
			echo "<tr><td></td></tr>";
			echo "<tr><td></td></tr>";
			
	}
	
}

?>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" value="Finish" name="Finish" />
		</td>
	</tr>
</table>
<div>
</form>
 <?php
   include "footer.php";
   ?>