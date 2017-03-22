<?php
include "dbconnect.php";
include "header.php";
if 
(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//echo	 $mypassword=$_SESSION['mypassword'];

$_SESSION['project_name']=$_POST['project_name'];

$_SESSION['assigned_to']=$_POST['assigned_to'];

$_SESSION['priority']=$_POST['priority'];

$_SESSION['status']=$_POST['status'];

$_SESSION['description']=$_POST['description'];

$_SESSION['start_date']=$_POST['start_date'];

$_SESSION['end_date']=$_POST['end_date'];

echo $project_name=$_POST['project_name'];
$assigned_to=$_POST['assigned_to'];
$description=$_POST['description'];
$priority=$_POST['priority'];
$status=$_POST['status'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];

}
$query=mysql_query("INSERT INTO `project`(`project_name`, `assigned_to`, `priority`, `status`, `description`, `start_date`, `end_date`,`created_by`) VALUES ('$project_name','$assigned_to','$priority','$status','$description','$start_date','$end_date','$myusername')");
if($query)
{
	echo "Project inserted Succesfully";
}
else
{
	echo "Something went wrong.Please try again later";
}
include "footer.php";
?>