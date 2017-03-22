<?php
include "header.php";
?>
<form>

<table width="80%" border=1>
	<tr>
		<td width="80%">
			<b>Quiz(s)</b>
		</td>
		<td>
			<b>on</b>
		</td>
		<td>
			<b>Delete</b>
		</td>
	</tr>

<?php
if(isset($_REQUEST['id']))
{
$r = mysql_query('select * from mcq_practice where mcqn_id='.$_REQUEST['id']);
while($row = mysql_fetch_assoc($r))
{
echo '<tr>
		<td>
			'.$row['question'].'
		</td>
		<td>
			'.$row['datetime'].'
		</td>
		<td>
			<a href=view.php?did='.$row['mcqp_id'].'&id='.$_REQUEST['id'].' onclick="Return deleletconfig()" >Delete</a>
		</td>
	</tr>
';
}
}
if(isset($_REQUEST['did']))
{
	$r = mysql_query('delete from mcq_practice where mcqp_id='.$_REQUEST['did']);
	if($r)
	{
		//echo "<script>alert('1 Record Deleted...');</script>";
		header('location:view.php?id='.$_REQUEST['id']);
	}
}
?>
<script type="text/javascript">
	function deleletconfig()
	{
		var result = confirm("Do you Really want to Delete?");
		if (result==true){
       alert ("Record deleted...")
    }
    return result;
    }
	
</script>
</table>
</form>

 <?php
   include "footer.php";
   ?>