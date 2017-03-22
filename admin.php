<?php
include "header.php";
?>
<font color="black">		

<br>
<table border='5'>



<tr ><th colspan='5' align="center" >ADMINISTRATOR DETAILS</th></tr>

<tr>
<th>ADMIN NAME</th>
<TH>ROLE OF ADMIN</TH>

<th>ADMIN CREATED BY</th>
<th>DELETE ADMIN</TH>
<TH>EDIT DETAILS</TH>

</tr>
<?php

$show = mysql_query("select a.id as admins,a.first_name,a.role_of_admin,a.admin_created_by,b.user_id,b.user_type from admin a,users b where a.role_of_admin=b.user_id");

while($rows=mysql_fetch_array($show))
{

$adminid=$rows['admins'];
?>
<tr>


<td>
<?php
$b = $rows['first_name'];
echo "$b";
?>
</td>


<td>
<?php
$c = $rows['user_type'];
echo "$c";
?>
</td>

<td>
<?php

$admin_created_by = $rows['admin_created_by'];
echo "$admin_created_by";
?>	
</td>
<TD bgcolor="red">
<?php
echo"<a href='admindelete.php?adminid=$adminid'>";
?> 
<font>
Delete
</a>


</TD>
<TD bgcolor="#00FF00">

<?php
echo"<a href='adminupdate.php?adminid=$adminid'>";
?> 
<font>

Update
</font>
</a>
</td>

<?php
}
?>

</tr>		
</table>
</font>
<br>
<?php

include "footer.php";
?>