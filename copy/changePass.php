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
/*
if((md5(sha1(md5($_POST['currentPassword'])))==$userRow['password']) && ($_POST['confirmPassword']==$_POST['newPassword'])){
	
	$query="UPDATE users set password='". md5(sha1(md5($_POST["newPassword"]))) ."' WHERE username='". $username."'";
	mysql_query($query) ;
	$_SESSION['password']=md5(sha1(md5($_POST["newPassword"])));
	$message = "Password Changed";
	
} else {$message = "plz try again";}
*/
?>


<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> ChangePassword</title>
<script type="text/javascript">function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) 
{
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
if(output==false)
document.getElementById("myForm").reset();
}
</script>
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
<center><form name="frmChange" id="myForm" method="post" action="changepass3.php" onSubmit="validatePassword()"><?php if(isset($message)) { echo $message; } ?><table>
<tr><td>current password: <input type="password" name="currentPassword" required /></td></tr>
<tr><td>new password: <input type="password" name="newPassword" required></td></tr> 
<tr><td>Repeat password: <input type="password" name="confirmPassword" required onBlur="validatePasword()"></td></tr>
<tr><td><input type="submit" value="changePassword"></td></tr> 
</table></form></center>
</div>
</body>
</html>

