<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <script type="text/javascript">
            function emailcheck() {
                var mail = document.getElementById("email").value;
                var password = document.getElementById("pwd").value;
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "loginapp.php?b="+mail+"&c="+password, true);
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        switch(this.responseText){
                            case "good": 
                                window.location.href = "homepage.php";                              
                                break;
                            case "Wrong Password":
                                err.textContent=this.responseText;
                                err.style.display="block";
                                break;
                            case "Email not found! Recheck your entries!":
                                err.textContent=this.responseText;
                                err.style.display="block";
                                break;
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
                <div class="input data">         
                    <label>Email-Address:</label>
                    <input type="email" id="email" placeholder="Email" required></div>
                <div class="input data">
                    <label>Password:</label>
                    <input type="password" id="pwd" placeholder="password" required></div>
                <div class="input sub">
                    <input type="button" value="Login" onclick="emailcheck();"></div>
                <div class="link">Not signed up? <a href="signup.php">Signup now!</a></div>
                </form>
            </section>
        </div> 
    </body>
</html>