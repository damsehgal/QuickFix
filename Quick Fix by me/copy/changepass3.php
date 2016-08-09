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

if((md5(sha1(md5(mysql_real_escape_string($_POST['currentPassword']))))==$userRow['password']) && (mysql_real_escape_string($_POST['confirmPassword'])==mysql_real_escape_string($_POST['newPassword']))){
	
	$query="UPDATE users set password='". md5(sha1(md5(mysql_real_escape_string($_POST["newPassword"])))) ."' WHERE username='". $username."'";
	mysql_query($query) ;
	$_SESSION['password']=md5(sha1(md5(mysql_real_escape_string($_POST["newPassword"]))));
	//$message = "Password Changed";
	?><script>alert("password chanegd successfully");window.location.href ="home.php";</script><?php
	
} else {//$message = "plz try again";
	?><script>alert("plz try agian");alert("before redirect..");
    window.location.href ="changePass.php";</script><?php
	}

?>
<html>
<head>
<title></title>
</head>
<body>
	<!--<?php if(isset($message)) { echo $message; } ?>-->
	
</body>
</html>
