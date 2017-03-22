<?php
include "header.php";
$user_type=$_POST['user_type'];
$query=mysql_query("INSERT INTO `users`(`user_type`) VALUES ('$user_type')");
if($query)
{
	header("location:view_user_types.php");
}
else
{
	echo "SOMETHING WENT WRONG.PLEASE TRY AGAIN LATER";
}
include "footer.php";
?>