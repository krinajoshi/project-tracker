<?php
include "dbconnect.php";
$q = mysql_real_escape_string(intval($_GET['q']));
$find_assignment=mysql_query("select assigned_to from project where project_id='".$q."' ");
$assigned_to=mysql_fetch_array($find_assignment);
$role_of_admin=$assigned_to['assigned_to'];
$sql="SELECT a.project_name,a.assigned_to,b.user_id,b.user_type,c.role_of_admin,c.first_name,c.id FROM project a,users b,admin c WHERE a.project_id = '".$q."' AND c.role_of_admin='".$role_of_admin."' GROUP BY c.id"  ;
$result = mysql_query($sql);

echo "<table>
<tr>
</tr>";

while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td><input type='checkbox' name='q1[]' value=' " .$row['id']. " 
' >$row[first_name]</td>";
    
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>