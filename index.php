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
            <h1>"Your premer add partner"</h1>
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





                
            <div class="pro-container">
                <div class="pro">
                    <h1>Billboards</h1><br>
                    <img src="Pictures/billboard.jpg" alt="">
                    <br><br>
                    <div class="des">
                        <p>Capture attention with our high-impact billboards and hoardings. 
                            We handle everything from concept and design to production and installation, 
                            ensuring your message stands tall in prime locations.</p>
                    </div>
                </div>

                <div class="pro">
                    <h1>Business Signage</h1><br>
                    <img src="Pictures/businesssignage.jpg" alt="">
                    <br><br>
                    <div class="des">
                        <p>Make a strong first impression with our custom business signage solutions. 
                            Whether it’s for storefronts, offices, or retail spaces, we create signs 
                            that reflect your brand’s personality and professionalism.</p>
                    </div>
                </div>

                <div class="pro">
                    <h1>Digital Display Boards</h1><br>
                    <img src="Pictures/digitaldisplay.jpeg" alt="">
                    <br><br>
                    <div class="des">
                        <p>
                            Light up your brand with our LED and digital display boards. 
                            Perfect for high-traffic areas, these vibrant, 
                            energy-efficient boards deliver your message day and night, 
                            creating dynamic visual experiences.</p>
                    </div>
                </div>

                <div class="pro">
                    <h1>Name boards</h1><br>
                    <img src="Pictures/nameboards.jpg" alt="">
                    <br><br>
                    <div class="des">
                        <p>Add a touch of elegance to your business with our bespoke nameboards. 
                            Crafted with precision and available in various styles and materials, 
                            these boards are perfect for businesses, homes, and institutions.</p>
                    </div>
                </div>

                <div class="pro">
                    <h1>Vehicle Branding</h1><br>
                    <img src="Pictures/vehiclebranding.jpg" alt="">
                    <br><br>
                    <div class="des">
                        <p>Vehicle Branding
                            Turn your vehicles into mobile billboards with our vehicle branding and wrapping services. 
                            We design and install eye-catching graphics that turn every drive into a marketing opportunity.</p>
                    </div>
                </div>

                <div class="pro">
                    <h1>Banners</h1><br>
                    <img src="Pictures/banners.jpg" alt="">
                    <br><br>
                    <div class="des">
                        <p>Promote your business, events, or special offers with our high-quality banners and posters. 
                            Available in various sizes, materials, and designs, they are perfect for both indoor and outdoor use.</p>
                    </div>
                </div>
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
