
<?php
session_start();
include('server/connection.php');
//if user has alredy registere tjen take user to account page

if(isset($_SESSION['logged_in'])){
    header('Location:account.php');
    
    exit;

}


if (isset($_POST['register'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conformPassword=$_POST['confirmPassword'];

//if password is dont match
    if ($password !==$conformPassword) {
        header('Location: register.php?error=password dont match');
        # code...
    }

   else if (strlen($password)<6) {
        header('Location: register.php?error=password must be at least 6 charactor');
        # code...
    }

    //if there is no error
    else{
            //check whether there is any user in this email or not
            $stmt1=$connect->prepare("SELECT  count(*) FROM users WHERE user_email=?");
            $stmt1->bind_param('s',$email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();

            //if there is a user already registere with this email
            if ($num_rows != 0) {
                header('Location:register.php?error=user with this email alredy exist');


                //if no user rejistered with this email before 
            }else{//create new user

                $stmt= $connect->prepare("INSERT INTO users (user_name,user_email,user_password) VALUES (?,?,?) ");  
                $stmt->bind_param('sss',$name,$email,md5($password));


                //if account was created successfully
                if ($stmt->execute()){
                    $user_id = $stmt->insert_id;
                    $_SESSION['user_id']=$user_id;
                    $_SESSION['user_email']=$email;
                    $_SESSION['user_name']=$name;
                    $_SESSION['logged_in']=$true;
                    header('Location:account.php?register=you registered successfully');
                }else{
                    header('Location:register.php?error=coould not create an accoun at the moment');
                }
            
            }



            

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

        <!----Register page background moving shapes---->
        <section id="registerpage">
            <div class="shape shape1"></div>
            <div class="shape shape2"></div>
            <div class="shape shape3"></div>
            <div class="shape shape4"></div>
            <div class="shape shape5"></div>
            <div class="shape shape6"></div>
            <div class="shape shape7"></div>
            <div class="shape shape8"></div>
            <div class="shape shape9"></div>
            <div class="shape shape10"></div>
            <div class="shape shape11"></div>
            <div class="shape shape12"></div>
            <div class="shape shape13"></div>
            <div class="shape shape14"></div>
            <div class="shape shape15"></div>

            
            <!----Register box---->
            <div class="register-box">
                <form action="register.php" method="post">
                    <p style="color: red;"> <?php    if(isset($_GET['error'])) echo $_GET['error']; ?></p>
                    <h1>Registration</h1>

                    <div class="input-B">
                        <div class="input-F">

                            <!----full name input---->
                            <input type="text" name="name" placeholder="Full Name" required>
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div class="input-F">

                            <!----email input---->
                            <input type="email" name="email" placeholder="Email" required>
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                    </div>

                    <div class="input-B">
                        <div class="input-F">

                            <!----password input---->
                            <input type="password" name="password" placeholder="Password" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>

                        <div class="input-F">

                            <!----confirm password input---->
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                    </div>

                    <!----submit registartion button---->
                    <button type="submit" class="register-btn" name="register">Register</button>
                </form>
            </div>
        </section>
            
        <!-- footer section -->
        <footer class="footer1">

            <!-- footer column 1 -->
            <div class="col1">
                <h1>Grafix <span>Adz</span></h1>
                <p class="footerlinks">
                    <a href="index.php">Home</a>
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