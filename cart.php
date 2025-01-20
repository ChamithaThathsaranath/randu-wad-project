
<?php
session_start();


if(isset($_POST['add_to_cart'])){           //check whethor user come from clicking add to cart button not from some ware else


    //if user has  alredy addeed a producat to cart



        if(isset($_SESSION['cart'])){

            $products_array_ids =array_column($_SESSION['cart'],"product_id"); //this array return the product ids that have added to the cart;
            if (!in_array($_POST['product_id'],$products_array_ids)) {   //if product alredy been added to tthe cart or not
               
               
                $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];


            $product_array= array(
                            'product_id'=>$product_id,
                            'product_name'=>$product_name,
                            'product_price'=>$product_price,
                            'product_image'=>$product_image,
                            'product_quantity'=>$product_quantity


            );

            $_SESSION['cart'][$product_id]=$product_array;
                        
                            

                        



            }else{

                echo '<script>alert("product was alredy aded")</script>';
                
                


            }

            //if this is the first product
            
        }else{

            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];


            $product_array= array(
                            'product_id' => $product_id,
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_image' => $product_image,
                            'product_quantity' => $product_quantity


            );

            $_SESSION['cart'][$product_id]=$product_array;


        }


        //update or calculate total
        calculateTotalCart();



//remove product from cart
}else if(isset($_POST['remove_product'])) {

    $product_id = $_POST["product_id"];
    unset($_SESSION['cart'][$product_id]);

    //calculate total

    calculateTotalCart();






}else if (isset($_POST['edit_quantity'])) {
    
    //we get id and quantity from the form

    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    //get the product array from the session

     $product_array = $_SESSION['cart'][$product_id];

     //update product quantity
    $product_array['product_quantity'] =$product_quantity;

    //return array baack its place

    $_SESSION['cart'][$product_id] = $product_array;

    //calculate total

    calculateTotalCart();



}else{
    //header('location:index.php');
}



function calculateTotalCart(){
    $total=0;
    foreach($_SESSION['cart'] as $key => $value){

           $product = $_SESSION['cart'][$key];

          $price = $product['product_price'];
           $quantity = $product['product_quantity'];

           $total = $total + ($price * $quantity);

    }
    $_SESSION['total'] =$total;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafix Print Hub</title>
    <script src="https://kit.fontawesome.com/2c5544bbf4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <!-- navbar section -->
    <section id="header">
        <!-- navbar logo -->
        <a href="home.html"><img src="Pictures/Logo.png" class="logo" alt=""></a>
        <div>
            <!-- other navbar links -->
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="login.php">Account</a></li>
                <li><a class="active" href="cart.php" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </section>

    <!-- cart section header with background image -->
    <section id="cart-header" >
        <h1>Your Cart.</h1>
    </section>

    <!-- cart section table -->
    <section id="cart-table" class="cart" >


        <div class="container >
            <h2 class="font-weight-bolde">your cart</h2>
            <hr>

            <table>
            <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Subtotal</th> <!-- Subtotal Column -->
                    <td></td> <!-- Separate Column for Remove Button -->
           </tr>

           <?php foreach($_SESSION['cart']as $key => $value){?>
           <tr>
                    <td>
                        <div class="product-info"></div>
                        <img src="Pictures/<?php echo $value['product_image']; ?>" />
                        <div>
                            <p> <?php echo $value['product_name']; ?> </p>
                            <small><span>$</span><?php echo $value['product_price']; ?></small>
                            <br>
                                <form method="post" action="cart.php">

                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                <input type="submit" name="remove_product" value="remove" class="remove-btn"  />

                                </form>
                            
                        </div>

                    </td>
                    <td>
                        


                        <form action="cart.php" method="post">  

                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" >
                            <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
                            <input type="submit" class="edit-btn" value="edit" name="edit_quantity" >
                        </form>


                    </td>
                    <td>
                        <span>$</span>
                        <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                    </td>


                </tr>

                <?php  } ?>


            </table>

        </div>


        <table width="100%">
            <thead>
                <!-- Updated cart section table main columns -->
                
                

            </thead>

            <tbody class="cart-items">
                <!-- products will load dynamically here if the add to cart button is pressed -->
                 
            </tbody>
        </table>
    </section>

    <!-- cart total section -->
    <section id="checkout">
        <div id="checkout-box">
            <h1>Cart Totals.</h1>
            <table>
                <tr>
                    <td id="cart-total-price"><strong>Rs.<?php echo $_SESSION['total']; ?> </strong></td>
                </tr>
            </table>
            <form action="checkout.php" method="get" >   
                <input type="submit" value="Checkout"  name="checkout">
            </form>
        </div>
    </section>

    <div class="cart-total">
        <table>
            
            <tr>
                <td>total</td>
                <td>Rs. <?php echo $_SESSION['total']; ?></td>
            </tr>
        </table>
    </div>

    <div>
        <button class="btn checkout-btn">checkout2</button>
    </div>


    <!-- footer section -->
    <footer class="footer1">
        <div class="col1">
            <h1>Grafix <span>Adz</span></h1>
            <p class="footerlinks">
                <a href="home.html">Home</a> |
                <a href="shop.html">Shop</a> |
                <a href="about.html">About</a> |
                <a href="login.html">Account</a> |
                <a href="cart.html" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </p>
            <p class="footer-companyname">Copyright ⓒ 2024 <strong>GrafixAdz</strong> All Rights Reserved</p>
            <p class="tc"><a href="t&c.html">Click here to view our T&C.</a></p>
        </div>

        <div class="col2">
            <div><i class="fa-solid fa-map-location-dot"></i><p><span>Grafix, Negombo, Sri Lanka</span></p></div>
            <div><i class="fa-solid fa-phone"></i><p><span>+94 71 424 6551</span></p></div>
        </div>

        <div class="col3">
            <p class="companyabout">
                <span>Stay Connected</span> Follow us on social media to keep up with our latest projects, news, and special offers.
            </p>
            <div class="footericons">
                <a href="https://www.facebook.com/p/Grafix-100066480171516/?_rdr"><i class="fa fa-facebook"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
