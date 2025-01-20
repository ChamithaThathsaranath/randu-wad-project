<?php
session_start();

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
    header('Location:account.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $stmt=$connect->prepare("SELECT user_id,user_name,user_email,user_password FROM users  WHERE user_email=? AND user_password=? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);



   if ($stmt->execute()){
    $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
    $stmt->store_result();




    if($stmt->num_rows()==1){
       $stmt->fetch();

        $_SESSION['user_id']=$user_id;
        $_SESSION['user_name']=$user_name;
        $_SESSION['user_email']=$user_email;
        $_SESSION['logged_in']=true;

        header('Location:account.php?message=logged in successfully');
        

    }else{
        header('Location:login.php?error=could not veryfy your account');
    }

   }else{
    //error
    header('Location:login.php?error=something went wrong');
   }
}


?>



<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafix Print Hub</title>
    <script src="https://kit.fontawesome.com/2c5544bbf4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <script src="script.js" async></script>

</head>
    <body>
        <!---navbar section---->
         <section id="header">

            <!---navbar logo---->
            <a href="home.html"><img src="Pictures/Logo.png" class="logo" alt=""></a>

            <div>
                <ul id="navbar">

                    <!---other navbar links ---->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a class="active" href="login.html">Account</a></li>
                    <li><a href="cart.html" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                </ul>
            </div>  
         </section>


         <!--- login box---->
         <section id="login">
            <div class="loginBox">
                <form action="login.php" method="post">
                    <p style="color: red;"><?php if (isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <h1>Login</h1>
                    <div class="lg-inputBox">
                         <!--- email input section---->
                        <input type="email" name="email" placeholder="Email" required>
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    </div>

                    <div class="lg-inputBox">
                        <!--- password input section---->
                        <input type="password" name="password" placeholder="Password" required>
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    </div>

                    <div class="remember-forget">
                        <!--- password remember checkbox---->
                        <label><input type="checkbox">Remember me</label>

                        <!--- forgot passwrod and reset page link---->
                        <a href="#">Forgot Password?</a>
                    </div>

                    <!--- login button---->
                    <button type="submit" name="login_btn">Login</button>
                    <div class="register-link">

                        <!--- account register page link---->
                        <p>Don't have an Account? <a href="register.php">Register.</a></p>
                    </div>

                </form>

            </div>
         </section>

         <!-- footer section -->
        <footer class="footer1">

            <!-- footer column 1 -->
            <div class="col1">
                <h1>Grafix <span>Adz</span></h1>
                <p class="footerlinks">
                    <a href="home.html">Home</a>
                    |
                    <a href="shop.html">Shop</a>
                    |
                    <a href="about.html">About</a>
                    |
                    <a href="login.html">Account</a>
                    |
                    <a href="cart.html" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </p>

                <p class="footer-companyname">Copyright ⓒ 2024 <strong>GrafixAdz</strong> All Rights Reserved</p>
                <br><P class="tc"><a href="t&c.html">Click here to view our T&C.<a></a></p>
            </div>

            <!-- footer column 2 -->
            <div class="col2">
                <div>
                    <i class="fa-solid fa-map-location-dot"></i>
                    <p><span>Grafix, Negombo, Sri Lanka</span></p>
                </div>

                <div>
                    <i class="fa-solid fa-phone"></i>
                    <p><span>+94 71 424 6551</span></p>
                </div>
            </div>

            <!-- footer column 3 -->
            <div class="col3">
                <p class="companyabout">
                    <span>Stay Connected</span> Follow us on social media to keep up 
                    with our latest projects, news, and special offers.
                </p>
                
                <div class="footericons">
                    <a href="https://www.facebook.com/p/Grafix-100066480171516/?_rdr"><i class="fa fa-facebook"></i></a>
                </div>

            </div>
        </footer>
    </body>
</html>