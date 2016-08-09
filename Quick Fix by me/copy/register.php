<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$mobileNo=mysql_real_escape_string($_POST['mobileNo']);
	$upass = md5(sha1(md5(mysql_real_escape_string($_POST['pass']))));
	
	if(mysql_query("INSERT INTO users(username,email,password,phoneNo) VALUES('$uname','$email','$upass','$mobileNo')"))
	{
		?>
        <script>alert('successfully registered ');window.location.href ="home.php";</script>
        <?php $res=mysql_query("SELECT * FROM users WHERE email='$email'");
        $row=mysql_fetch_array($res);
        $_SESSION['user'] = $row['user_id'];
	}
	else
	{
		?>
        <script>alert('error while registering you...');</script>
        <?php
	}
}
//img src="/dashboard/images/xampp-logo.svg"
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="text" name="mobileNo" placeholder="mobile Number" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="login.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
