<?php
	session_start();
	$oldphone= $_SESSION['ph'];
	$name=$_POST['user'];
	$phone=$_POST['ph'];
	$email=$_POST['email'];
	$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'brainwarmup');

$q="update users set Name='$name',phone='$phone',Email='$email' where phone='$oldphone' ";
mysqli_query($con,$q);

$_SESSION['ph']=$phone;
mysqli_close();
	header('location: welcome.php');

?>