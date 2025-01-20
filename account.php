
<?php 
        //if user not logging and try to come dirrecr account page this is how user can sea
        session_start();

        if (!isset($_SESSION['logged_in'])) {
            header('Location:login.php');
            exit;



            

            
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
<body class="account-page">

    <!-- Navbar section -->
    <section id="header">
        <!-- nabar logo -->
        <a href="home.html"><img src="Pictures/Logo.png" class="logo" alt=""></a>

        <div>
            <!-- other navbar links -->
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a class="active" href="login.php">Account</a></li>
                <li><a href="cart.php" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            </ul>
        </div>
     </section>

     <!-- account page container -->
    <div class="accountpg-container">
        <header>
            <h1>Your Account</h1>
            <p><a href="logout.php" id="logout btn">LogOut</a></p>
        </header>
        
        <section class="user-info">

            <!-- user infor edit form -->
            <h2>Edit Your Details</h2>
            <form id="user-form">
                <label for="name">Name:<?php  echo $_SESSION['user_name'];  ?></label>   <!-- $$$$$ here we have php commands that connect database and account details -->
                
                
                <label for="name">Email:<?php  echo $_SESSION['user_email']; ?></label>
                
                
                
                
                
                
                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </section>

        <!-- order history section -->
        <section class="order-history">
            <h2>Order History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>2023-10-01</td>
                        <td>Shipped</td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>2023-09-15</td>
                        <td>Delivered</td>
                        <td>$75.00</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

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