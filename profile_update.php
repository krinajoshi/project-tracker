<?php
include "header.php";
$id=$_REQUEST['id'];
$sql=mysql_query("select * from admin where id='".$id."'");
while($row=mysql_fetch_array($sql))
{
$city=$row['city'];
$admin=$row[1];
$oldpassworddb=$row['password'];
$last_name=$row['last_name'];
$phone=$row['phone'];
$email=$row['email'];
$date_of_birth=$row['date_of_birth'];
}
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$lname=$_POST['lname'];
$admin1=$_POST['txtcity'];
$admin2=$_POST['phone'];
$mail=$_POST['mail'];
$dob=$_POST['dob'];
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$repeatnewpassword=$_POST['repeatnewpassword'];
if($oldpassword==$oldpassworddb)
{
//check the new password
if ($newpassword==$repeatnewpassword)
{
//succes
//change password in db
$sql = mysql_query("
UPDATE `admin` SET `password`='$newpassword' WHERE id='".$id."'
");
}
else
{
 die ("New password dont match!");
}
}
else
{
	
 die("Old password doesnt match!");
}
	
$sql=mysql_query("update admin set city='$admin1' where id='".$id."'");
$sql=mysql_query("update admin set phone='$admin2' where id='".$id."'");
$sql=mysql_query("update admin set first_name='$name' where id='".$id."'");
$sql=mysql_query("update admin set email='$mail' where id='".$id."'");
$sql=mysql_query("update admin set date_pf_birth='$dob' where id='".$id."'");
$sql=mysql_query("update admin set last_name='$lname' where id='".$id."'");

header('location:my_profile.php');

}
?>

<form action="#" enctype="multipart/form-data" method="post">
<table align="center" >
<tr>
<td> 
NAME:
</td>
<td>
<input type="text" name="name" value="<?php echo $admin;?>"/>
</td>
</tr>
<tr>
<td>
 Old password:</td><td> <input type ='text' name ='oldpassword'></td></tr>
 <tr>
<td>
New password:</td><td> <input type='password' name='newpassword'></td></tr>
 <tr>
<td>
Repeat new password:</td><td> <input type='password' name='repeatnewpassword'></td></tr>

<tr>
<td> 
SURNAME:
</td>
<td>
<input type="text" name="lname" value="<?php echo $last_name;?>"/>
</td>
</tr>
<tr>
<td> 
CITY:
</td>
<td>
<input type="text" name="txtcity" value="<?php echo $city;?>"/>
</td>
</tr>
<?php
$search="SELECT * from users ";
$search1=mysql_query($search);

?>
<tr>
<td> 
PHONE NUMBER
</td>
<td><input type="text" name="phone" value="<?php echo $phone;?>"/>

</td>
</tr>

<tr>
<td> 
DATE OF BIRTH
</td>
<td><input type="date" name="dob" value="<?php echo $date_of_birth;?>"/>

</td>
</tr>


<tr>
<td> 
EMAIL
</td>
<td><input type="text" name="mail" value="<?php echo $email;?>"/>

</td>
</tr>
<tr>
<td colspan="2" align="center"> 
<input type="submit" value="submit" name="submit" />
</td>
</tr>
</form>
</table>


<?php
include "footer.php";
?>