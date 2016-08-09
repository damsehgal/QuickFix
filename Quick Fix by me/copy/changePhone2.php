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
$userName=$userRow['username'];
$newPhone=mysql_real_escape_string($_POST['newPhone']);
$query="Select * from users where phoneNo='$newPhone'";
if(mysql_num_rows(mysql_query($query))>=1)
{
	//echo"phoneNo id already in use";
	?><script> alert("phoneNo ID already in Use");window.location.href ="changePhone.php";</script>
	<?php
	}
	else{
		$query="UPDATE `users` SET `phoneNo`= '$newPhone' WHERE `username`='$userName'";
		mysql_query($query);
		$userRow['phoneNo']=$newPhone;
		?><script>alert("new phoneNo set to<?php echo"$newPhone"?>");window.location.href ="changeInfo.php";</script>
		<?php
		}
		
?>

