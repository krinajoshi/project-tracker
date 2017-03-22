<?php
include "header.php";
?>
<form>
<table>
	<tr>
		<td>
			<a href="AddMCQName.php">Add New Test</a>
		<td>
		<td>
			<a href="AddMCQ.php">Add New Question</a>
		<td>
	</tr>
</table>

<h2>Quiz</h2>
<table width="90%" border=1>
	<tr>
		<td width="80%">
			<b>Quiz Name</b>
		</td>
		<td>
			<b>on</b>
		</td>
		<td>
			<b>Delete Quiz</b>
		</td>
	</tr>

<?php
if(isset($_REQUEST['did']))
{
	$re = mysql_query('delete from mcq_name where mcqn_id='.$_REQUEST['did']);
	if(!$re)
	{
		echo "Something wrong";
	}
}
$r = mysql_query('select * from mcq_name where flag=1 ORDER BY DATETIME DESC');
while($row = mysql_fetch_assoc($r))
{
echo '<tr>
		<td>
			<a href=view.php?id='.$row['mcqn_id'].'>'.$row['name'].'</a>
		</td>
		<td>
			'.$row['datetime'].'
		</td>
		<td>
			<a href=MCQback.php?did='.$row['mcqn_id'].'>Delete</a>
		</td>
	</tr>
';
}

?>
</table>
<br>
<h2>MCQ Examination</h2>
<table width="90%" border=1>
	<tr>
		<td width="80%">
			<b>Exam Name</b>
		</td>
		<td>
			<b>on</b>
		</td>
		<td>
			<b>Delete Exam</b>
		</td>
	</tr>

<?php
if(isset($_REQUEST['did']))
{
	$re = mysql_query('delete from mcq_name where mcqn_id='.$_REQUEST['did']);
	if(!$re)
	{
		echo "Something wrong";
	}
}
$r = mysql_query('select * from mcq_name where flag=2  ORDER BY DATETIME DESC');
while($row = mysql_fetch_assoc($r))
{
echo '<tr>
		<td>
			<a href=view.php?id='.$row['mcqn_id'].'>'.$row['name'].'</a>
		</td>
		<td>
			'.$row['datetime'].'
		</td>
		<td>
			<a href=MCQback.php?did='.$row['mcqn_id'].'>Delete</a>
		</td>
	</tr>
';
}

?>
</table>
</form>

 <?php
   include "footer.php";
   ?>