<?php
include "header.php";


$arr = array();

if (!empty($_POST['keywords'])) {
	$keywords = $db->real_escape_string($_POST['keywords']);
	$sql = "SELECT a.id, b.project_name, a.first_name, c.description, c.task_id, c.file_location,c.priority, c.status, c.task_type, c.end_date

FROM project b, tasks c, admin a

WHERE b.project_id = c.project_id
AND status like '%keywords%'

AND c.assigned_to = a.id

GROUP BY c.task_id 

ORDER BY task_id DESC";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->ID, 'title' => $obj->post_title);
		}
	}
}
echo json_encode($arr);
