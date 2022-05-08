<!DOCTYPE html>
<html>
    <head>
        <title>SignUp</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <script type="text/javascript">
            function emailcheck() {
                var username=document.getElementById("fname").value+" "+document.getElementById("lname").value;
                var mail = document.getElementById("email").value;
                var password = document.getElementById("pwd").value;
                var cpassword = document.getElementById("cpwd").value;
                var err = document.getElementById("err");
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "signupapp.php?a="+username+"&b="+mail+"&c="+password+"&d="+cpassword, true);
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText=="Passwords are not the same! Please recheck!"){
                            err.textContent=this.responseText;
                            err.style.display="block";
                        }
                        if(this.responseText=="Account added! you'll be redirected to login in 5s"){
                            err.textContent=this.responseText;
                            err.style.display="block";
                            setTimeout(() => {window.location.href = "login.php";}, 5000);
                        }
                        if(this.responseText=="Email already exists!"){
                            err.textContent=this.responseText;
                            err.style.display="block";
                        }
                    }
                };
                xhttp.send();
            }
        </script>
    </head>
    <body>
        <div class="stuff">
            <p>@Made by Sifeddine Regragui</p>
            <div class="links">
                <a href="https://www.linkedin.com/in/sifeddine-regragui-248a91225">LinkedIn</a>
                <a href="https://github.com/SifeddineReg">GitHub</a>
            </div>
        </div>
        <div class="signup">
            <section class="formsign">
                <header>Real time chat app</header>
                <form>
                <div id="err" style="display: none;">All fields are required!</div>
                <div class="names">
                    <div class="input data">
                        <label>First Name:</label>
                        <input class="fname" id="fname" type="text" placeholder="First Name" required></div>
                    <div class="input data">
                        <label>Last Name:</label>
                        <input type="text" id="lname" placeholder="Last name" required></div>
                </div> 
                <div class="input data">         
                    <label>Email-Address:</label>
                    <input type="email" id="email" placeholder="Email" required></div>
                <div class="input data">
                    <label>Password:</label>
                    <input type="password" id="pwd" placeholder="Password" required></div>
                <div class="input data">
                    <label>Confirm Password:</label>
                    <input type="password" id="cpwd" placeholder="Confirm Password" required></div>
                <div class="input sub">
                    <input type="button" value="SignUp" onclick="emailcheck();"></div>
                <div class="link">Already signed in? <a href="login.php">Login now!</a></div>
                </form>
            </section>
        </div> 
    </body>
</html>