<?php
include "header.php";
$task_id = $_SESSION['id'];
//echo $id;
$comment=$_POST['comment'];
$comment_added_by=$_POST['comment_added_by'];
$today = date("F j, Y, g:i a");
	$note1 = $comment.'<br>'.$comment_added_by.'<br>'.$today;
	
		
		$sql = mysql_query("SELECT * FROM comments WHERE task_id = '".$task_id."' ") ;
		$row=mysql_fetch_array($sql);
		$commentz=$row['comment'];
		
		$comments = '<br>'.$commentz.'<br>'.$note1;
	//	$note .= '<br>'.$notes.'<br>'.$note_added_by;
		
		if( mysql_num_rows($sql) > 0) {

$insertion = mysql_query("UPDATE `comments` SET `comment`='$comments' WHERE `task_id`='".$task_id."'");
		}
		else
		{
			
$insertion = mysql_query("INSERT INTO `comments`(`comment`, `task_id`)VALUES('$comments','$task_id')");
		}
if($insertion)
{
	//header("Location:index.php?id=$student_id");
}	
?>

<button onclick="goBack()">Go Back</button>											

<script>
function goBack() {
window.history.go(-2)
}
</script>