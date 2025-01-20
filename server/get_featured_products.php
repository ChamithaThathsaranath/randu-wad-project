<?php
include('connection.php');
$stmt=$connect->prepare("SELECT * FROM products LIMIT 6 ");
$stmt->execute();
$featured_product = $stmt->get_result();
?>