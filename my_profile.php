<?
include "header.php";
echo $student_id;
$query=mysql_query("select * from admin where id='$student_id'");
while($row=mysql_fetch_array($query))
{
	$id=$row['id'];
	$first_name=$row['first_name'];
	$last_name=$row['last_name'];
	$email=$row['email'];
	$phone=$row['phone'];
	$city=$row['city'];
}
echo "<table border='1'>
<tr>
<th>Name</th>
<th>Surname</th>
<th>Email</th>
<th>Phone</th>
<th>City</th>
<th>Update</th>
</tr>";
    echo "<tr>";
    echo "<td>" . $first_name . "</td>";
    echo "<td>" . $last_name . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $phone . "</td>";
    echo "<td>" . $city . "</td>";
  ?>  
<TD bgcolor="#00FF00">

<?php
echo"<a href='profile_update.php?id=$id'>";
?> 
<font>

Update
</font>
</a>
</td>
<?
	
	echo "</tr>";

echo "</table>";

include "footer.php";
?>