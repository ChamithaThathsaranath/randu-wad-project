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



<?php 
include('layouts/header.php');


?>


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
         <?php 
include('layouts/footer.php');


?>