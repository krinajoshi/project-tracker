<?php
include "dbconnect.php";
session_start();
$adminid=$_REQUEST['adminid'];
//echo $adminid;
mysql_query("DELETE FROM `users` WHERE `user_id`='".$adminid."'");
header('location:view_user_types.php');
?>