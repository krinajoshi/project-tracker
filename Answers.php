<?php
include "header.php";
?>
<form>

<br>
<br>
<table border=1 width="100%">
	<tr>
		<td width="70%">
		
		</td>

	</tr>
<?php

$qid= $_REQUEST['qid'];
echo "<input type=text name=qid value=".$qid." hidden=true />";
$result = mysql_query("select * from question where q_id=".$_REQUEST['qid']);
// echo $result;
while($row = mysql_fetch_array($result))
{
	echo "<tr>
			<td>";
	echo	"<h1><a href=Answers.php?qid=".$row['q_id'].">".$row['question']."</a></h1>";
	echo "<br><span >Asked by ".getname($row['u_id']);
		echo " on ".$row['datetime']."</span>";
	echo "</td></tr>";	
	
	
}	
?>
</table>
<br>
<table width="100%" border="1">
<tr>
<td width="70%"><b>Answers<b>
</td>
<td width="15%"><b>By<b>
</td>
<td width="15%"><b>On<b>
</td>
</tr>
<?php
$result = mysql_query("select * from answer where q_id=".$_REQUEST['qid']);
// echo $result;
while($row = mysql_fetch_array($result))
{
	echo "<tr>
			<td>";
	echo	$row['answer'];
		echo	"</td>";
		
	
	echo "
			<td>";
	echo getname($row['u_id']);
		echo	"</td>";
		
	echo "
			<td>";
	echo	$row['datetime'];
		echo	"</td>
		</td></tr>";
	
}
function getname($id)
{	
	$result = mysql_query("select first_name,last_name from admin where id=$id");
	$r = mysql_fetch_array($result);
	return $r['first_name']." ".$r['last_name'];
}
?>
</table>
<br>
<textarea name="answer" rows="4" cols="50" required ></textarea>
<br>
<input type="Submit" value="Answer"/>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</form>

<?php

$id = $_SESSION['id'];
if(isset($_REQUEST['answer']))
{
	$q = "insert into answer (q_id,u_id,answer,datetime) values (".$_REQUEST['qid'].",".$id.",'".$_REQUEST['answer']."',CURRENT_TIMESTAMP)";
	if(mysql_query($q))
	{
		echo "<script>
		  alert('New Answer inserted...');
		  </script>";
		  header('location:Answers.php?qid='.$_REQUEST['qid']);
	}
	else
	{
		echo "something wrong";
	}
}


?>


 <?php
   include "footer.php";
   ?>
