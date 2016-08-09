<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$phoneNo=$userRow['phoneNo'];
?>
<html>
<head>
	<title>ChangePhone</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div id="header">
	<div id="left">
    <label>Quickfix</label>
    </div>
    <div id="right">
    	<div id="content">
        	<a href="booking.php"> book complaint</a>
			
			hi' <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
		
		</div>
    </div>
</div>
<div id="body">
	<form action="changePhone2.php" method="POST"><center>
	<table border="0">
		<tr> <td>current phone=</td><td><?php echo"$phoneNo";?> </td></tr>
		<tr> <td>new  phone= </td><td><input type="text" name="newPhone"></td></tr>
		<tr><td><input type="submit" value="SUBMIT"> </td></tr>
	</table></center></form>
</div>
</body>
</html>

