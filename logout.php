<?php  
	session_start();
	$idd=$_SESSION['id'];
	$link=mysqli_connect("localhost","root","","chatapp");
	mysqli_query($link,"UPDATE users set status='offline' where userid='$idd'");
	session_destroy();
	header("location: login.php");
?>