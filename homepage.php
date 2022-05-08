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
        $link=mysqli_connect("localhost","root","","chatapp");
        $query1=mysqli_query($link,"SELECT * from users where userid='$id'");
        $row1=mysqli_fetch_assoc($query1);
        $query2=mysqli_query($link,"UPDATE users set status='online' where userid='$id'");
    ?>
    <div class="stuff">
            <p>@Made by Sifeddine Regragui</p>
            <div class="links">
                <a href="https://www.linkedin.com/in/sifeddine-regragui-248a91225">LinkedIn</a>
                <a href="https://github.com/SifeddineReg">GitHub</a>
            </div>
        </div>
    <div class="home">
        <section class="user1">
            <header style="border-radius:0; width: 312px;">
                <div class="user">
                    <img src="df-pp.jpg" width="40"
                    height="40" style="border-radius: 50px;">
                    <span class="statususer"></span>
                    <div class="userinfo">
                        <span><?php echo $row1['username'];?></span>
                        <p><?php echo $row1['status'];?></p>
                    </div>
                </div>
                <a href="logout.php" style="border: none; padding: 8px;
                color: white;
                background-color: rgb(19, 7, 7); font-size: 17px;
                cursor: pointer; border-radius: 0; width: 55px; ">logout</a>
            </header>
            <div class="search">
                <input type="text" id="search" placeholder="Enter name" style="border: px;">
            </div>
            <div class="list">
                
            </div>
        </section>
    </div> 
</body>
<script type="text/javascript">
        list=document.querySelector(".list");
        search=document.getElementById("search");
        search.onkeyup = ()=>{
            let cont=search.value;
            if(cont!="") search.classList.add("active");
            else search.classList.remove("active");
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "homeusers2.php?q="+cont, true);
            xhttp.onload = ()=>{
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    list.innerHTML=xhttp.responseText;
                }
            };
            xhttp.send();
        }
        setInterval(()=> {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "homeusers.php", true);
            xhttp.onload = ()=>{
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    if(!search.classList.contains("active")) list.innerHTML=xhttp.responseText;
                }
            };
            xhttp.send();
        },500);
    </script>
</html>