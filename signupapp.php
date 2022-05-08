<?php  
$link=mysqli_connect("localhost","root","","chatapp");
$userid=uniqid();
$username=$_REQUEST['a'];
$email=$_REQUEST['b'];
$password=md5($_REQUEST['c']);
$cpassword=md5($_REQUEST['d']);
$emailcheck=mysqli_query($link,"SELECT email from users where email='$email'");
if($password!=$cpassword){
	echo "Passwords are not the same! Please recheck!";
}
else{
	if(mysqli_num_rows($emailcheck)==0){
		$query="INSERT INTO users(userid,username,email,password) VALUES('$userid','$username','$email','$password')";
		mysqli_query($link,$query);
		echo "Account added! you'll be redirected to login in 5s";
	}
	else{echo "Email already exists!";}
}
?>