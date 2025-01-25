<?php
session_start();

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
    header('Location:index.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $stmt=$connect->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins  WHERE admin_email=? AND admin_password=? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);



   if ($stmt->execute()){
    $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
    $stmt->store_result();




    if($stmt->num_rows()==1){
       $stmt->fetch();

        $_SESSION['admin_id']=$admin_id;
        $_SESSION['admin_name']=$admin_name;
        $_SESSION['admin_email']=$admin_email;
        $_SESSION['admin_logged_in']=true;

        header('Location:index.php?message=logged in successfully');
        

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

    

</head>
    <body>
    <h1 style="text-align: center;">Admin Login</h1>


    <section id="login" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center;">
    <div class="loginBox" style="width: 300px; padding: 20px; margin: auto; background: #f9f9f9; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
        <form action="login.php" method="post">
            <p style="color: red;"><?php if (isset($_GET['error'])){echo $_GET['error'];} ?></p>
            <h1 style="margin-bottom: 20px;">Login</h1>
            <div class="lg-inputBox" style="margin-bottom: 15px; position: relative;">
                <!--- email input section---->
                <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <span class="icon" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                    <i class="fa-solid fa-envelope"></i>
                </span>
            </div>

            <div class="lg-inputBox" style="margin-bottom: 15px; position: relative;">
                <!--- password input section---->
                <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <span class="icon" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                    <i class="fa-solid fa-lock"></i>
                </span>
            </div>

            <!--- login button---->
            <button type="submit" name="login_btn" style="width: 100%; padding: 10px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Login</button>
        </form>
    </div>
</section>


        
    </body>
</html>