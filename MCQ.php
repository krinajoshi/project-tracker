<?php
include "header.php";
?>
<form>

<br>
<table width="80%" border=1>
	<tr>
		<td width="80%">
			<b>Select Quiz</b>
		</td>
		<td>
			<b>on</b>
		</td>
	</tr>

<?php
$r = mysql_query('select * from mcq_name where flag=1 ORDER BY DATETIME DESC');
while($row = mysql_fetch_assoc($r))
{
echo '<tr>
		<td>
			<a href=Test1.php?id='.$row['mcqn_id'].'>'.$row['name'].'</a>
		</td>
		<td>
			'.$row['datetime'].'
		</td>
	</tr>
';
}
?>
</table>


<br>
<h4>Results</h4>
<table width="100%" border=1>

	<tr>
		<td width="40%">
			<b>Quiz Name</b>
		</td>
		<td>
			<b>Create on</b>
		</td>
		<td>
			<b>You attempted on</b>
		</td>
		<td>
			<b>You Result</b>
		</td>
	</tr>

<?php
$r = mysql_query("SELECT an.name, r.tmark, r.omark, r.flag,an.datetime as dt, r.datetime as dt1
FROM result AS r
LEFT JOIN mcq_name AS an ON an.mcqn_id = r.mcqn_id
WHERE r.flag =1
AND r.u_id =".$_SESSION['id']."
ORDER BY r.DATETIME DESC ");
while($row = mysql_fetch_assoc($r))
{
echo '<tr>
		<td>
			'.$row['name'].'
		</td>
		<td>
			'.$row['dt'].'
		</td>
		<td>
			'.$row['dt1'].'
		</td>
		<td>
			Total marks was: '.$row['tmark'].'<br>
			You got: '.$row['omark'].'<br>
			You got: '.round((($row['omark']*100)/$row['tmark']),0).'%
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