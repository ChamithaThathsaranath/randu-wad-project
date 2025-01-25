<?php
session_start();

include('../server/connection.php');

// Pagination configuration
$limit = 5; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$start = ($page - 1) * $limit; // Starting record for the current page

// Fetch product data from the database
$query = "SELECT * FROM products LIMIT $start, $limit";
$result = $connect->query($query);

// Get total records for pagination
$total_query = "SELECT COUNT(*) AS total FROM products";
$total_result = $connect->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table with Pagination</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        table thead {
            background: #007BFF;
            color: white;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
        .pagination {
            text-align: center;
            margin: 20px 0;
        }
        .pagination a {
            text-decoration: none;
            padding: 8px 12px;
            margin: 0 5px;
            background: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .pagination a:hover {
            background: #0056b3;
        }
        .pagination a.active {
            background: #0056b3;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Products Table</h1>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Offer</th>
                <th>Product Category</th>
                <th>Product Color</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['product_id']; ?></td>
                <td><img src="<?php echo $row['product_image']; ?>" alt="Product Image"></td>
                <td><?php echo $row['product_price']; ?></td>
                <td><?php echo $row['product_offer']; ?></td>
                <td><?php echo $row['product_category']; ?></td>
                <td><?php echo $row['product_color']; ?></td>
                <td><a href="edit_product.php?id=<?php echo $row['product_id']; ?>" style="color: #007BFF;">Edit</a></td>
                <td><a href="delete_product.php?id=<?php echo $row['product_id']; ?>" style="color: red;">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
</body>
</html>
