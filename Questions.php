<?php
include "header.php";
?>

<form action=# mathod=POST>
<?php
$query=mysql_query("select role_of_admin from admin where id='".$student_id."'");
$find_role=mysql_fetch_array($query);
$role_of_admin=$find_role['role_of_admin'];
//echo "Role of admin:".$role_of_admin;
if($role_of_admin==3)
{
echo "<a href=AddNew.php>Add New Question</a>";
}
?>
<br>
<span style="color:red">* Please click on question to view answers/reply question.</span>
<br>
<table border=1 width="100%">
	<tr>
		<td width="70%">
		<b>Questions</b>
		</td width="15%">
		<td>
		<b>Asked By</b>
		</td>
		<td width="15%">
		<b>Asked on</b>
		</td>
	</tr>
<?php

//include "dbconnect.php";

$result = mysql_query("select * from question ORDER BY DATETIME DESC");
while($row = mysql_fetch_array($result))
{
	echo "<tr>
			<td>";
	echo	"<a href=Answers.php?qid=".$row['q_id'].">".$row['question']."</a>";
		echo	"</td>";
	echo "
			<td>";
	echo	getname($row['u_id']);
		echo	"</td>
		</td>";
		echo "
			<td>";
	echo	$row['datetime'];
		echo	"</td>";
	
}	
function getname($id)
{	
	$result = mysql_query("select first_name,last_name from admin where id=$id");
	$r = mysql_fetch_array($result);
	return $r['first_name']." ".$r['last_name'];
}
?>
</table>
</form>

 <?php
   include "footer.php";
   ?>