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
	$flag= (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== TRUE);

	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book complaint</title>
<script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body>
<div id="header">
	<div id="left">
    <label>Quickfix</label>
    </div>
    <div id="right">
    	<div id="content">
        	
		<a href="changeInfo.php">changeInfo</a>		
			hi' <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
		
		</div>
    </div>
</div>

<center>
<div id="login-form">
<form method="post" action="booked.php">
<table align="center" width="30%" border="0">
<tr>
<td>
	<select name="service" id="service" >
		<option value="5" selected>Select a service</option>
		<option value='0'>Vehicle Services</option> 
		<option value='1'>Electrician</option> 
		<option value="2">Plumber</option> 
		<option value="3">Computer Repair</option>
		
	</select> 
	<select name="subService" id="subService"> 
		<option value='0'>Select a service first</option> 
	</select>
	<script> console.log($('#service').val());
	 $('#service').click(function(){ console.log($('#service').val());
	 if($('#service').val()==0) $('#subService').html("<option value='0'>CarWashing</option><option value='1'>CarRepair</option><option value='2'>RentDriver</option><option value='3'>RentCar</option>");
	 else if($('#service').val()==1) $('#subService').html("<option value='0'>FanRepair</option><option value='1'>ACRepair</option><option value='2'>Refrigerator Repair</option><option value='3'>WashingMachine Repair</option>");
	 else if($('#service').val()==2) $('#subService').html("<option value='0'>SanitoryRepair</option><option value='1'>SanitoryReplace</option>"
	 );
	 else $('#subService').html("<option value='0'>Computer Repair</option><option value='1'>LaptopRepair</option>"); 
	 }); 
	 </script>

</td>
</tr>
<tr>
<td><input type="text" name="addr1" placeholder="adress line 1" required /></td>
</tr>
<tr>
<td><input type="text" name="addr2" placeholder="adress line 2" required /></td>
</tr>
<tr>
<td><input type="text" name="addr3" placeholder="adress line 3"  /></td>
</tr>
<tr>
	<td><?php if(!$flag) echo"<input type='time' name='book_time'>";else echo"<input type='text' name='book_time' placeholder='tine in hh:mm'  />" ?>
	</td>
</tr>
<tr>
<td><?php if(!$flag) echo"<input type='date' name='book_date'>";else echo"<input type='text' name='book_date' placeholder='date in YYYY-MM-DD'  />" ?></td>
</tr>
<tr>
<td><button type="submit" name="BookService">Book Service</button></td>
</tr>

</table>
</form>
</div>
</center>
</body>
</html>
