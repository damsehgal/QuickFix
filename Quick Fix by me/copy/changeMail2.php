<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$email=$userRow['email'];
$userName=$userRow['username'];
$newMail=mysql_real_escape_string($_POST['newMail']);
$query="Select * from users where email='$newMail'";
if(mysql_num_rows(mysql_query($query))>=1)
{
	//echo"email id already in use";
	?><script> alert("email ID already in Use");window.location.href ="changeMail.php";</script>
	<?php
	}
	else{
		$query="UPDATE `users` SET `email`= '$newMail' WHERE `username`='$userName'";
		mysql_query($query);
		$userRow['email']=$newMail;
		?><script>alert("new email id set to<?php echo"$newMail"?>");window.location.href ="changeInfo.php";</script>
		<?php
		}
		
?>
