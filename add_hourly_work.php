<?php
include "header.php";
?>
<form action="insert_hourly_work.php" method="post">
<table BORDER="2" cellspacing="0" cellpadding="0">
	<tr>
		<td><b>TIME</b>
		</td>
		<td>
		<b>DESCRIBE WORK DONE</b>
		</td>
	</tr>
	<tr>
		<td><input type="text" name="time" id="time" required>
		</td>
		<td>
		
		<textarea name="10_11" rows="6" cols="50" required>
		</textarea>
		</td>
	</tr>
	<tr>
	<td colspan="2"><center>
<input type="SUBMIT">
</td>
</tr>
	</table>
</form>
<?php
include "footer.php";
?>
