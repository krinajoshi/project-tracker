<?php
include "header.php";
$adminid=$_REQUEST['adminid'];
$sql=mysql_query("select * from admin where id='$adminid'");
while($row=mysql_fetch_row($sql))
{
$admin=$row[1];
}
if(isset($_POST['submit']))
{
$admin1=$_POST['txtcity'];
$admin2=$_POST['pwd'];
$sql=mysql_query("update admin set name='$admin1' where id='$adminid'");
$sql=mysql_query("update admin set role_of_admin='$admin2' where id='$adminid'");

header('location:admin.php');

}
?>

<form action="#" enctype="multipart/form-data" method="post">
<table align="center" >
<tr>
<td> 
NAME:
</td>
<td>
<input type="text" name="txtcity" value="<?php echo $admin;?>"/>
</td>
</tr>
<?php
$search="SELECT * from users ";
$search1=mysql_query($search);

?>
<tr>
<td> 
ROLE OF ADMIN:
</td>
<td><select name="pwd">
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
<input type="submit" value="submit" name="submit" />
</td>
</tr>
</form>
</table>

<?php
include "footer.php";
?>