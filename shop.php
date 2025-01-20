<?php

include('server/connection.php');
$stmt=$connect->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->get_result();
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
                    <li><a class="active" href="shop.php">Shop</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="login.php">Account</a></li>
                    <li><a href="cart.html" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </section>


        <!----shopheader with background image--->
        <section id="shopheader">
            <h1>We Offer Total Solutions To your needs !!!</h1>
           
        </section>

        <br>

        <!----product conatiner section--->
        <section id="product1-shop" class="section1-shop">


            

            <?php while($raw=$products->fetch_assoc()) {?>         <!-- $$$$$$$this is array repeation work ass databass connected repeating product -->


            <!----product conatiner 1--->
            <div class="pro-container-shop">
                <a href="singleproduct.php?product_id=<?php echo $raw['product_id']; ?>">             <!----included product id on ural now we now which product we chose--->

                    <div class="pro-shop">
                        <h1><?php echo $raw['product_name']; ?></h1><br>
                        <img src="Pictures/<?php echo $raw['product_image']; ?>" alt="">
                        <br><br>
                        <div class="des-shop">
                            <span>Standard Size Billboard</span>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <h3>Price: Rs.<?php echo $raw['product_price']; ?></h3>
                        <i class="fa fa-shopping-cart shopPGcart"></i>
                       
                    </div>
                </a>

                <?php } ?>
            </div>
        </section>

        <!----product page end banner with background image--->
        <section id="Custom">
                <h1>Please contact our shop for Customized Orders !!!</h1>
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