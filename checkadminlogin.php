<?php 
// Connect to server and select database.
include "dbconnect.php";
session_start();
ob_start();

// username and password sent from form 
$myusername=$_POST['email']; 
$mypassword=$_POST['mobile']; 


// To protect MySQL injection (more detail about MySQL injection).
//The stripslashes() function removes backslashes added by the addslashes() function.
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);


//The mysql_real_escape_string() function escapes special characters in a string for use in an SQL statement
//The following characters are affected:
//  \x00,\n,\r,\,',",\x1a


$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM admin WHERE first_name='$myusername' and password='$mypassword' limit 1 ";

$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
 	$_SESSION['loggedin'] = true;
    $_SESSION['username'] = $myusername;
    $_SESSION['mypassword'] = $mypassword;
	$_SESSION['id']=$id;
while($data = mysql_fetch_array($result))
{
$id = $data['id'];
$_SESSION['id']=$id;
}
header("location:index.php?id=$id");
}

else 
{
	echo $_SESSION['t2error']="PLEASE ENTER PROPER LOGIN CREDENTIALS";
	
header("location:adminlogin.php");
}

?>