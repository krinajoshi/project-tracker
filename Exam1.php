
<?php
include "header.php";
?>
<html>
<?php
$re = mysql_query("select time from mcq_name where mcqn_id=".$_REQUEST['id']);
	
	
	$val1 = mysql_fetch_assoc($re);
$dateFormat = "d F Y -- g:i a";
$targetDate = time() + (1*($val1['time']*60));//Change the 25 to however many minutes you want to countdown
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay	 = floor($secondsDiff/60/60/24);
$remainingHour	= floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));
$actualDateDisplay = date($dateFormat,$actualDate);
$targetDateDisplay = date($dateFormat,$targetDate);
?>
<head>
<script type="text/javascript">
  var days = <?php echo $remainingDay; ?>  
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $remainingMinutes; ?>  
  var seconds = <?php echo $remainingSeconds; ?> 
function setCountDown ()
{
	
  seconds--;
  if (seconds < 0){
	  minutes--;
	  seconds = 59
  }
  if (minutes < 0){
	  hours--;
	  minutes = 59
  }
  if (hours < 0){
	  days--;
	  hours = 23
  }
  document.getElementById("remain").innerHTML = "Time : , "+hours+" hours, "+minutes+" minutes, "+seconds+" seconds";
  SD=window.setTimeout( "setCountDown()", 1000 );
  if (minutes == '00' && seconds == '00') { seconds = "00"; window.clearTimeout(SD);
   		//window.alert("Time is up. Press OK to continue."); // change timeout message as required
		 // window.location = "http://www.lucknowmail.com" // Add your redirect url
		 document.getElementById('myform').submit();
 	} 

}

</script>
<style>
#header {
           
            width: 100%;
            bottom :0;
            position: fix;
			 
			
        }
</style>
</head>

<body onload="setCountDown();">
<form action="Result1.php" id="myform" >	
<div id="remain" style="background-color: ; color: #2fa4e7;"></div>
<br>
<br>

<table>
	<tr>
		<td>
			MCQ Examination
		</td>
		<td>
				
		</td>
	</tr>
<?php
if(isset($_REQUEST['id']))
{
	echo '<input type="text" name="id" value="'.$_REQUEST['id'].'" hidden=true > ';
	$r = mysql_query("select * from mcq_practice where mcqn_id=".$_REQUEST['id']);
	$arr = array();
	$ans = array();
	$c =1;
	while($val = mysql_fetch_assoc($r))
	{
		$arr[] = $val;
	}
	shuffle($arr);
	foreach($arr as $ra)
	{
			$ans[$ra['mcqp_id']] = $ra['ans'];
	
		echo'	
			<tr>
				<td>
					Question '.$c.' :
				</td>
				<td>
					'.$ra['question'].'
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
				<table>
					<tr>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="1" checked> '.$ra['option1'].'
						</td>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="2" > '.$ra['option2'].'<br>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="3" > '.$ra['option3'].'
						</td>
						<td>
							<input type="radio" name="'.$ra['mcqp_id'].'" value="4" > '.$ra['option4'].'
						</td>
					</tr>
				</table>
				</td>
			</tr>';
			
			$c++;
			echo "<tr><td></td></tr>";
			echo "<tr><td></td></tr>";
			
	}
	

}

?>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" value="Finish" name="Finish" />
		</td>
	</tr>
</table>


</form> 

</body>
</html>


 <?php
   include "footer.php";
?>
 
