
<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <script src="script.js" defer></script> <!-- Keep only this one -->
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9;">

    <div style="max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #333;">Checkout</h2>


        <form action="server/place_order.php" method="POST">

        
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; color: #555;">Full Name:</label>
                <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; color: #555;">Email Address:</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="phone" style="display: block; margin-bottom: 5px; color: #555;">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="city" style="display: block; margin-bottom: 5px; color: #555;">City:</label>
                <input type="text" id="city" name="city" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="address" style="display: block; margin-bottom: 5px; color: #555;">Shipping Address:</label>
                <textarea id="address" name="address" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; resize: none;"></textarea>
            </div>

            <p>Total =  <?php echo $_SESSION['total']; ?></p>

            
            <input type="submit" class="btn" id="checkout-btn" name="place_order" value="PLACE ORDER" style="width: 100%; padding: 10px; background-color: #007BFF; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
        
        
        </form>
    </div>

    
            
    
        
    
        
    


</body>
</html>
