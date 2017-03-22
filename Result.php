<?php
include "header.php";
?>
<?php
//if(isset($_REQUEST['Finish']))
{
	

$r = mysql_query("select mcqp_id,ans from mcq_practice where mcqn_id=".$_REQUEST['id']);
	$arr = array();
	$ans = array();
	$c =1;
	while($val = mysql_fetch_assoc($r))
	{
		$ans[$val['mcqp_id']] = $val['ans'];
		$arr[$val['mcqp_id']] = $_REQUEST[$val['mcqp_id']];
	}
	//print_r($arr);
	echo "<br>";
	//print_r($ans);
	$totmark = count($ans);
	$omark = count(array_intersect_assoc($arr, $ans));
	
	echo "<br><h2>Dear ".$_SESSION['username'].", You got <b>".$omark."</b> out of <b>".$totmark."</b></h2>";
	echo "<br><h2>You got <b>".round((($omark*100)/$totmark),0)."%</b></h2>";
	
	$re = mysql_query("insert into result (mcqn_id,tmark,omark,flag,u_id,datetime) values (".$_REQUEST['id'].",".$totmark.",".$omark.",1,".$_SESSION['id'].",CURRENT_TIMESTAMP)");
	if(!$re)
	{
		echo "Something Wrong";
	}
}
?>
 <?php
   include "footer.php";
   ?>