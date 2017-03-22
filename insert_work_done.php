<?php
include "header.php";
$student_id;
 $hour10_11=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['10_11']));
 $hour11_12=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['11_12']));
 $hour12_1=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['12_1']));
 $hour1_2=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['1_2']));
 $hour2_3=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['2_3']));
 $hour3_4=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['3_4']));
 $hour4_5=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['4_5']));

$query=mysql_query("INSERT INTO `confirm_work_done`(`admin_id`, `10_11`, `11_12`, `12_1`, `1_2`, `2_3`, `3_4`, `4_5`) VALUES ('$student_id','$hour10_11','$hour11_12','$hour12_1','$hour1_2','$hour2_3','$hour3_4','$hour4_5')");
if($query)
{
	echo "<b><big>Thank you so much for all the time and effort.</big></b>";
//$to="krinajoshi@rocketmail.com";
$to="krinajoshi@rocketmail.com,kris@ccbst.ca";
	$subject="Work Done by ";
	$subject .= $myusername;
	$subject .= "-";
	$subject .=  date("Y/m/d");

	$headers = 'From: pmtool@ccbst.info' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
$messages ="=====================================" ;
$messages .="\r\n" ;
$messages .="10 to 11: " ;
$messages .= $hour10_11;
$messages .="\r\n" ;
$messages .= "----------------------------------------------------------------";
$messages .="\r\n" ;
$messages .="11 to 12: " ;
$messages .= $hour11_12;
$messages .="\r\n" ;
$messages .= "----------------------------------------------------------------";
$messages .="\r\n" ;
$messages .="12 to 1: " ;
$messages .= $hour12_1;
$messages .="\r\n" ;
$messages .= "----------------------------------------------------------------";
$messages .="\r\n" ;
$messages .="1 to 2: " ;
$messages .= $hour1_2;
$messages .="\r\n" ;
$messages .= "----------------------------------------------------------------";
$messages .="\r\n" ;
$messages .="2 to 3: " ;
$messages .= $hour2_3;
$messages .="\r\n" ;
$messages .= "----------------------------------------------------------------";
$messages .="\r\n" ;
$messages .="3 to 4: " ;
$messages .= $hour3_4;
$messages .="\r\n" ;
$messages .= "----------------------------------------------------------------";
$messages .="\r\n" ;
$messages .="4 to 5: " ;
$messages .= $hour4_5;
$messages .="\r\n" ;
$messages .= "----------------------------------------------------------------";
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