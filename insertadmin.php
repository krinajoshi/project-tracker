<?php
include "header.php";
$_SESSION['fname']=$_POST['fname'];
$_SESSION['lname']=$_POST['lname'];
$_SESSION['male']=$_POST['male'];
$_SESSION['city']=$_POST['city'];
$_SESSION['phone']=$_POST['phone'];

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password=$_POST['txtpwd'];
$email=$_POST['email'];
$male = $_POST['male'];
$city= $_POST['city'];
$phone = $_POST['phone'];
$date_of_birth=$_POST['date_of_birth'];
$role_of_admin=$_POST['role_of_admin'];


$phone=trim($_POST["phone"]);
/*
$str=$_POST['email'];
$emailid= explode('@',$str);
$a=count($emailid);
//echo ($a); 
$b=trim($str);
$d=count($b);
	
$mail=explode('.',$str);
$c=count($mail);*/

if($fname == '')
	{
		$_SESSION['ferror']='please fill 1st name';
	}

if($lname == '')
	{
		$_SESSION['lerror']='please fill  surname';
	}

if($password == '')
	{
		$_SESSION['lerror']='please fill  password';
	}

/*
if($email=='')
	{
		$_SESSION['mail']='please fill email';
	}*/

if($male=='')
	{
		$_SESSION['merror']='select gender';
	}	
if($city==' ')
	{
		$_SESSION['cerror']='enter city';
	}
 /*
if($a!=2||$c!=2)
		{
		$_SESSION['acerror']='invalid email id';
		}*/
if($phone == '')
	{
		$_SESSION['moerror']='please enter your phone number';
	} 
if(is_numeric(trim($_POST["phone"])) == false ) {
$_SESSION['moerror']= "error : Please enter numeric value.";

}

if(strlen($phone)>15) {
 $_SESSION['moerror']="error : Number should be not be more then 15 digits.";

}

if( ($fname== " ") || ($lname == "") || ($password == "")  || ($male == "") || ($city == "")||($phone == '')||(strlen($phone)>15)||(is_numeric(trim($_POST["phone"])) == false ))
{
header("Location: addadmin.php");
echo "Something went WRONG,please CHECK your DATA again";
}
else
{
	
if(isset($_POST['submit']))
{
mysql_query("INSERT INTO `admin`(`first_name`, `last_name`, `password`, `email`, `phone`, `gender`, `date_of_birth`,`city`,`admin_created_by`, `role_of_admin`) VALUES('$fname','$lname','$password','$email','$phone','$male','$date_of_birth','$city','$myusername','$role_of_admin')"); 
echo "record insert successfully....";
//header("Location:admin.php");
}
}

include "footer.php";
?>
