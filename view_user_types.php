<?php
include "header.php";
?>
<font color="black">		

<br>
<table border='5'>



<tr ><th colspan='5' align="center" >USER TYPES</th></tr>

<tr>
<TH>TYPE OF USER</TH>

<th>DELETE USER</TH>

</tr>
<?php

$show = mysql_query("SELECT * FROM `users`");

while($rows=mysql_fetch_array($show))
{

$adminid=$rows['user_id'];
?>
<tr>


<td>
<?php
$b = $rows['user_type'];
echo "$b";
?>
</td>


<TD bgcolor="red">
<?php
echo"<a href='user_type_delete.php?adminid=$adminid'>";
?> 
<font>
Delete
</a>


</TD>

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