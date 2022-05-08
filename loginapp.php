<?php  
$link=mysqli_connect("localhost","root","","chatapp");
$userid=uniqid();
$email=$_REQUEST['b'];
$password=md5($_REQUEST['c']);
$usercheck=mysqli_query($link,"SELECT email,password from users where email='$email'");
if(mysqli_num_rows($usercheck)>0){
	$row=mysqli_fetch_assoc($usercheck);
	if($row['password']==$password) {
		$idcheck=mysqli_query($link,"SELECT userid from users where email='$email'");
		$id=mysqli_fetch_assoc($idcheck);
		session_start();
		$_SESSION['id']=$id['userid'];
		echo "good";
	}
	else echo "Wrong Password";
}
else{
	echo "Email not found! Recheck your entries!";
}
?>