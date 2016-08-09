<?php
	session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$username=$userRow['username'];
$phone=$userRow['phoneNo'];
	
	$service=$_POST['service']+1;
	$subService=$_POST['subService']+1;
	$subServiceID=$service*10+$subService;
	
	$addr1 = mysql_real_escape_string($_POST['addr1']);
	$addr2 = mysql_real_escape_string($_POST['addr2']);
	$addr3=mysql_real_escape_string($_POST['addr3']);
	$query="SELECT subService from subservices where subServiceID='$subServiceID'";
	$subService=mysql_fetch_array(mysql_query($query));
	$time=mysql_real_escape_string($_POST['book_time']);
	$date=mysql_real_escape_string($_POST['book_date']);
	//echo"$subService[0]";
	$QueryTime=time();
	
	$query="INSERT INTO `booking`(`subservice`, `username`, `Addr1`, `Addr2`, `Addr3`, `Time`, `Date`,`QueryTime`) VALUES ($subService[0],'$username','$addr1','$addr2','$addr3','$time:00','$date','$QueryTime')";
	
	mysql_query($query) or die(mysql_error());
	$query="select book_id FROM `booking` WHERE `QueryTime` ='$QueryTime' and username='$username'";
	$book_id=mysql_fetch_row(mysql_query($query));
	$_SESSION['book_id']=$book_id[0];
	//echo"$book_id[0]";
	
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Data filled</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<table>
<tr>
<td>
Subservice :<?php echo"$subService[0]";?></td>
</tr>  
<tr><td>
Addr1 :<?php echo"$addr1";?>
</td></tr>
<tr><td>
Addr2 :<?php echo"$addr2";?>
</td></tr>
<tr><td>
Addr3 :<?php echo"$addr3";?>
</td></tr>
<tr><td>
Time : <?php echo"$time";?>
</td></tr>
<tr><td>
Date : <?php echo"$date";?>
</td></tr>
<tr><td>
<a href="home.php"><button type="submit" name="confirm">Confirm</button></a>
</td></tr>
<tr><td>
<form action="cancel.php" method="POST">
<input type="submit" value="Refill">
</form>
</td></tr>
</table>
</center>
</body>
</html>
