<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
$id=$_SESSION['book_id'];
$query="DELETE FROM `booking` WHERE `book_id`='$id'";
mysql_query($query) or die(mysql_error());

header("Location: booking.php");
$_SESSION['book_id']="";
?>
