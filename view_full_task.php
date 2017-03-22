<?php

include "dbconnect.php";
$task_id=$_GET['id'];

		$sql = "SELECT * FROM `tasks` WHERE task_id = '".$task_id."' " ;



		$res = mysql_query($sql);



	$row =  mysql_fetch_array($res);



	$description= $row['description']; 

echo $description;	



$_SESSION['id'] = $task_id;



?>

