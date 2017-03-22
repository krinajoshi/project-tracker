<?php
include "header.php";
$project_view=mysql_query("select a.project_name,a.status,a.priority,a.assigned_to,a.created_on,a.created_by,a.end_date,b.user_id,b.user_type from project a,users b where a.assigned_to=b.user_id");
?>
<table border="1">
<tr>
<th>
NAME
</th>

<th>
STATUS
</th>

<th bgcolor=#00FF00>PRIORITY
</th>

<th>ASSIGNED TO
</th>


<th>CREATED BY
</th>
<th>
CREATED ON
</th>

<th>
ESTIMATED COMPLETION DATE
</th>
</tr>

<?php
while($disp_project=mysql_fetch_array($project_view))
{
?>	
<tr>
<td>
<?php echo $disp_project['project_name'];?>
</td>

<td>

<?php echo $disp_project['status'];?>
</td>

<td bgcolor="#00FF00">

<?php  echo $disp_project['priority'];?>
</td>

<td>
<?php echo $disp_project['user_type'];?>
</td>


<td>
<?php echo $disp_project['created_by'];?>
</td>
<td>
<?php echo $disp_project['created_on'];?>
</td>

<td>
<?php echo $disp_project['end_date'];?>
</td>

</tr>
<?php
}
?>
</table>
<?php

include "footer.php";
?>