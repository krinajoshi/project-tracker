<?php 
include "dbconnect.php";

session_start();
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>		

</head>
<body>
<p class="bold mb4">
 <br>
<form name="form1" method="post" action="checkadminlogin.php">

<table align="center" width="30%" border="1" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
<tr bgcolor="#4682B4" >
<th colspan='2'>
LOGIN
</th>
</tr>
<tr>
<td align="center">Username</td>
<td align="center">
<input name="email" type="text" id="email"></td>
</tr>
<tr>
<td align="center">Password</td>
<td align="center"><input name="mobile" type="password" id="mobile"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="Submit" value="Login"></td>
</tr>

<font color="red">
<?php
	print $_SESSION['t2error'];
	$_SESSION['t2error']='';
?>
</font>
</table>

</form>

</body>
</html>
