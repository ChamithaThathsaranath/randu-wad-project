<?php 
include('layouts/header.php');
session_start();

?>



           


        <br>
        <div class="payment_sec">

        <h1 >payment</h1>

        <p><?php echo $_GET['order_status']; ?></p>

            <p>Total payment : Rs.<?php echo $_SESSION['total']; ?></p>
            <input type="submit" class="btn" value="Pay now">
        </div>

          

        <!----product page end banner with background image--->
        <section id="Custom">
                <h1>This is payment section .Please contact our shop for Customized Orders !!!</h1>
        </section>

        <?php 
include('layouts/footer.php');


?>

      