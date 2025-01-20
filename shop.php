<?php

include('server/connection.php');
$stmt=$connect->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->get_result();
?>



<?php 
include('layouts/header.php');


?>

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
        <?php 
include('layouts/footer.php');


?>