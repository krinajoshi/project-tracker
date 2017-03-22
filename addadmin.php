<?php
include "header.php";
if 
(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//echo	 $student_id= $_SESSION['abc'];
//echo	 $mypassword=$_SESSION['mypassword'];
}
?>
<form action="insertadmin.php" enctype="multipart/form-data" method="post">
<table align="center" >
<tr>
<td>
<b>USER NAME:<font color="red">*</font></b>
</td>
<td>
<input type="text" name="fname" id="1" >

<font color="red">

<?php
print $_SESSION['ferror'];
$_SESSION['ferror' ]=' ';
?>
</font>
<br>

<br>
</td>
</tr>
<tr>
<td>
<b> USER SURNAME:<font color="red">*</font></b>
</td>

<td>
<input type="text" name="lname" id="01" >
<br>
<font color="red">

<?php


print $_SESSION['lerror'];
$_SESSION['lerror' ]='';
?>
</font>

</td>
</tr><tr>
<td> <b>
USER PASSWORD:
</td>
<td>
<input type="text" name="txtpwd" />
</td>
</tr>
<tr>
<td>
<b>EMAIL-ID:<font color="red">*</font></b>
</td>
<td><input type="text" name="email" id="2" required>
</td>
</tr>
<tr>
<td>
<b>PHONE  NUMBER :<font color="red">*</font></b></td>
<td>
<input type="text" name="phone" id="phone">

<font color="red">

<?php
print $_SESSION['moerror'];
$_SESSION['moerror']='';
?>
</font>
</td>
</TR>
<tr>
<td><b>
GENDER:<font color="red">*</font></b>
</td>
<td>
<input type="radio" name="male" value="male"
<?php 
if ($_SESSION['male']=='male')
{
 print " checked";
} ?>

> Male
<input type="radio" name="male" value="female"
<?php 
if($_SESSION['male']=='female')
{
 print " checked";
}
?>
> Female
<font color="red">
<?
print @$_SESSION['merror'];
?>
</font>

<font color="red">
<?php
	print $_SESSION[''];
	$_SESSION['merror']='';
?>
</font>

</td>
</tr>
<tr>
<td> 
<b>DATE OF BIRTH:
</td>
<td>
<input type="date" name="date_of_birth" />
</td>
</tr>
<tr>
<td><B>
CITY:<font color="red">*</font></B>
</td>
<td>
<input type="text" name="city" id="city" >
<br>

<font color="red">
<?php
	print $_SESSION['cerror'];
	$_SESSION['cerror']='';
?>
</font>
<br>
</td>
</tr>

	<?php
$search="SELECT * from users ";
$search1=mysql_query($search);

?>
<tr>
<td> 
<b>ROLE OF USER:
</td>
<td><select name="role_of_admin">
<option selected="selected">SELECT</option>
<?php
while($row = mysql_fetch_array($search1))
{
$user_id=$row['user_id'];
$pname=$row['user_type'];

    ?>
        <option value= <?php echo $user_id;?> >
		<?php echo $pname; ?>  
	

		</option>
		
   <?php
   
}
?>


</select>
</td>
</tr>

<tr>
<td colspan="2" align="center"> 
<input type="submit" value="SUBMIT" name="submit" class="btn btn-primary"/>
</td>
</tr>
</form>
</table>
<?php
include "footer.php";
?>