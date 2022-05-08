<?php  
    session_start(); 
    $id=$_SESSION['id'];
    if(!isset($id)) header("location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>Home</title>
</head>
<body>
    <?php
        $dude=$_GET['userid'];
        $link=mysqli_connect("localhost","root","","chatapp");
        $query1=mysqli_query($link,"SELECT * from users where userid='$dude'");
        $row1=mysqli_fetch_assoc($query1);
    ?>
    <div class="stuff">
            <p>@Made by Sifeddine Regragui</p>
            <div class="links">
                <a href="https://www.linkedin.com/in/sifeddine-regragui-248a91225">LinkedIn</a>
                <a href="https://github.com/SifeddineReg">GitHub</a>
            </div>
        </div>
    <div class="home">
        <section class="chatguy">
            <header style="border-radius:0;">
                <a href="homepage.php">&larr;</a>
                <div class="user">
                    <img src="df-pp.jpg" width="50"
                    height="50" style="border-radius: 50px;">
                    <span class="statususer"></span>
                    <div class="userinfo">
                        <span><?php echo $row1['username']; ?></span>
                        <p><?php echo $row1['status'];?></p>
                    </div>
                </div>
            </header>
            <div class="chatbox">
                
            </div>
            <div class="search">
                <input type="text" id="sender" value="<?php echo $id;?>">
                <input type="text" id="reciever" value="<?php echo $dude;?>">
                <input type="text" class="msg" placeholder="Enter text">
                <input type="button" class="send" value="send" onclick="sendmsg();">
            </div>
        </section>
    </div>
</body>
<script type="text/javascript">
    var senderid=document.getElementById('sender');
    var recievrid=document.getElementById('reciever');
    senderid.style.display="none";
    recievrid.style.display="none";
    function sendmsg(){   
        var msginput=document.querySelector(".chatguy .search .msg");
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "sendmsg.php?a="+senderid.value+"&b="+recievrid.value+"&c="+msginput.value, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                msginput.value="";
            }
        };
        xhttp.send();
    }
    setInterval(()=> {
        var xhttp = new XMLHttpRequest();
        var box=document.querySelector(".chatguy .chatbox");
        xhttp.open("GET", "getmsgs.php?a="+senderid.value+"&b="+recievrid.value, true);
        xhttp.onload = ()=>{
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                box.innerHTML=xhttp.responseText;
            }
        };
        xhttp.send();
    },500);

</script> 
</html>