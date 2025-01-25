<?php
session_start();
include('../server/connection.php');



//get orders

    
    $stmt=$connect->prepare("SELECT * FROM orders");

    

$stmt->execute();

$orders = $stmt->get_result();


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;">

    <h1 style="text-align: center; margin-bottom: 20px;">Admin Dashboard</h1>

    <table style="width: 100%; border-collapse: collapse; margin: auto; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
        <thead style="background: #007BFF; color: white;">
            <tr>
                <th style="padding: 10px; border: 1px solid #ddd;">Order ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Order Status</th>
                <th style="padding: 10px; border: 1px solid #ddd;">User ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Order Date</th>
                <th style="padding: 10px; border: 1px solid #ddd;">User Phone</th>
                <th style="padding: 10px; border: 1px solid #ddd;">User Address</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Edit</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <?php  foreach($orders as $order) {?>
            <tr style="background: #f9f9f9;">
                
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?php echo $order['order_id']; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?php echo $order['order_status']; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?php echo $order['user_id']; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?php echo $order['order_date']; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?php echo $order['user_phone']; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?php echo $order['user_address']; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                    <a href="#" style="color: #007BFF; text-decoration: none;">Edit</a>
                </td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                    <a href="#" style="color: red; text-decoration: none;">Delete</a>
                </td>
            </tr>
            <?php  }?>
            <!-- Add more rows dynamically here -->
        </tbody>
    </table>

</body>
</html>
