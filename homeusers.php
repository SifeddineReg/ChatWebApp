<?php
session_start();
$link=mysqli_connect("localhost","root","","chatapp");
$ido=$_SESSION['id'];
$usercheck=mysqli_query($link,"SELECT * from users WHERE NOT userid='$ido'");
$rsp = "";
if (mysqli_num_rows($usercheck)==1) {
	echo "There's no users to chat with.";
}elseif (mysqli_num_rows($usercheck)>0) {
	while($row=mysqli_fetch_assoc($usercheck)){
		$rsp .= '<a href="chatpage.php?userid='.$row['userid'].'">
		            <div class="contacts">
		                    <img src="df-pp.jpg" width="50"
		                     height="50" style="border-radius: 50px;">
		                    <span class="'.$row['status'].'"></span>
	                        <div class="contactinfo">
	                        	<span>'.$row['username'].'</span>
		                	</div>
		            </div>
		         </a>';
	}
}
echo $rsp;

?>