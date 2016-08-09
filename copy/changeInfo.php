<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<html>
<head>
<title>change Info </title>
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
<center><table>
<tr>
	<td>current Email </td><td><b>  <?php echo $userRow['email'];?></b></td>
	<td><a href="changeMail.php"><button type="submit" name="changeMail">change Mail</button></a></td>
</tr>
<tr>
	<td>current phoneNumber</td><td> <b> <?php echo $userRow['phoneNo'];?></b></td>
	<td><a href="changePhone.php"><button type="submit" name="changePhone">change Phone</button></a></td>
</tr>
<tr>	<td></td>
	<td><a href="changePass.php"><button type="submit" name="changePass">change PassWord</button></a></td>
</tr>
</table></center>
</div>
</body>
</html>
