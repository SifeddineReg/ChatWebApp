<?php  
$link=mysqli_connect("localhost","root","","chatapp");
$send=$_REQUEST['a'];
$recieve=$_REQUEST['b'];
$message=$_REQUEST['c'];
if (!empty($message)) {
	mysqli_query($link,"INSERT INTO messages(senderid,recieverid,message) VALUES('$send','$recieve','$message')");
	echo "good";
}
	
?>