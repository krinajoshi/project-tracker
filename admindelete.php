<?php
include "dbconnect.php";
session_start();
$adminid=$_REQUEST['adminid'];
mysql_query("delete from admin where id=$adminid");
header('location:admin.php');
?>