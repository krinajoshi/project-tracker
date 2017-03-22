<?php
include "header.php";
$student_id;
 $hour10_11_post =$_POST['10_11'];
 $hour10_11 = str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($hour10_11_post ) );
 $time=$_POST['time'];
$query=mysql_query("INSERT INTO `hourly_work_done`(`admin_id`, `description`, `time`) VALUES ('$myusername','$hour10_11','$time')");
if($query)
{
	echo "<b><big>Thank you so much for all the time and effort.</big></b>";
//$to="krinajoshi@rocketmail.com";

if($student_id=="74"||$student_id=="77")
{
//$to="krinajoshi@rocketmail.com";
	$to="developer@ccbst.ca,kris@ccbst.ca,designer2developer@gmail.com";
//	$to="developer@ccbst.ca,kris@ccbst.ca,orion@osdynamics.com";
}
else 
{
$to="developer@ccbst.ca,kris@ccbst.ca";
}
	$subject="Work Done by ";
	$subject .= $myusername;
	$subject .= "->";
	$subject .=  $time;

	$headers = 'From: pmtool@ccbst.info' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
$messages ="=====================================" ;
$messages .="\r\n" ;
$messages .=$time;
$messages .= " ";
$messages .= $hour10_11;
$messages .="\r\n" ;
$messages .="=====================================" ;
$ret = mail($to, $subject, $messages, $headers);
	
}
else
{
	echo "Something went wrong.Please try again later";
}
?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
<?
include "footer.php";

?>