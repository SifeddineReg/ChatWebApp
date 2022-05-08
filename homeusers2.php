<?php
$link=mysqli_connect("localhost","root","","chatapp");
$q=$_REQUEST['q'];
$rsp="";
$query=mysqli_query($link,"SELECT * from users where username like '$q%'");
if (mysqli_num_rows($query)>0) {
	while($row=mysqli_fetch_assoc($query)){
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
	echo $rsp;
}
else{
	echo "there is no such user.";
}

?>