<?php  
$link=mysqli_connect("localhost","root","","chatapp");
$send=$_REQUEST['a'];
$recieve=$_REQUEST['b'];
$msg="";
$query=mysqli_query($link,"SELECT * from messages where senderid='$send' and recieverid='$recieve' or senderid='$recieve' and recieverid='$send'");
if (mysqli_num_rows($query)>0) {
	while ($lol=mysqli_fetch_assoc($query)) {
		if ($send===$lol['senderid']) {
			$msg .='<div class="sent">
	                    <p>'.$lol['message'].'</p>
	               	</div>';
		}
		else{
			$msg .='<div class="recieved">
                    	<img src="df-pp.jpg">
                    	<p>'.$lol['message'].'</p>
                	</div>';
		}
	}
	echo $msg;
}

?>