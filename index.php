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
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="login.php">Account</a></li>
                    <li><a href="cart.php" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            
         </section>

         <!---main background image ---->
            <div class="backgroundimage"></div>
         
        <section id="homepg">
            <h1>"Your Premier Partner"</h1>
            <h2>For Advertising signs & Boards </h2>
            <br>
            <p>At Grafix Adz, we specialize in creating high-quality advertising signs and boards that make your business stand out.</p>
            <p>We have the expertise to deliver exceptional results that drive attention.</p>
            <button class="Homebutton"onclick="location.href='shop.php'">Shop Now</button>
        </section>

        <br>
        <section id="product1" class="section1">
            <div class="section1-head">
                <h1>Take a look at our Featured Services.</h1>
                <h2> Elevate Your Brand Visibility & Boost Sales !!!<h2>
                <h3>From large-scale billboards to custom nameboards, our services are tailored to meet the diverse needs of our clients.</h2>
                <h3>Let's take a look at what we offer.</h2>
            </div>

            <br>
            <div onload="showSlides()" class="slideshow-container">
                <div class="mySlides fade">
                    <img src="Pictures/1.jpeg" style="width:100%">
                </div>
        
                <div class="mySlides fade">
                    <img src="Pictures/2.jpeg" style="width:100%">
                </div>
        
                <div class="mySlides fade">
                    <img src="Pictures/3.jpeg" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="Pictures/4.jpeg" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="Pictures/5.jpeg" style="width:100%">
                </div>
            </div>
            
            <br>





                
<!-- $$$$$$$$$ in this section create product ass a data base connected resource. -->





            <?php include('server/get_featured_products.php');?>

            <?php while($raw=$featured_product->fetch_assoc()) {?>         <!-- $$$$$$$this is array repeation work ass databass connected repeating product -->


                


            <div class="pro-container">
                <div class="pro">
                    <h1><?php echo $raw['product_name'] ?> </h1><br>
                    <img src="Pictures/<?php echo $raw['product_image'] ?>" alt="">
                    <br><br>
                    <div class="des">
                        <p><?php echo $raw['product_description'] ?></p>
                    </div>
                </div>
                <?php } ?>
                






        
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