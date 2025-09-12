<?php
// Queries to get the total counts from the database
$totalClientsQuery = "SELECT COUNT(*) AS total_clients FROM clients";
$totalProductsQuery = "SELECT COUNT(*) AS total_products FROM products";
$totalOrdersQuery = "SELECT COUNT(*) AS total_orders FROM orders";
$totalUsersQuery = "SELECT COUNT(*) AS total_users FROM users"; // Total users query
$totalBlogsQuery = "SELECT COUNT(*) AS total_blogs FROM blogs"; // Total blogs query

// Execute queries and fetch results
$totalClientsResult = $conn->query($totalClientsQuery);
$totalProductsResult = $conn->query($totalProductsQuery);
$totalOrdersResult = $conn->query($totalOrdersQuery);
$totalUsersResult = $conn->query($totalUsersQuery);
$totalBlogsResult = $conn->query($totalBlogsQuery);

// Fetch the results from the query
$totalClients = $totalClientsResult->fetch_assoc()['total_clients'];
$totalProducts = $totalProductsResult->fetch_assoc()['total_products'];
$totalOrders = $totalOrdersResult->fetch_assoc()['total_orders'];
$totalUsers = $totalUsersResult->fetch_assoc()['total_users'];
$totalBlogs = $totalBlogsResult->fetch_assoc()['total_blogs'];

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Custom Styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .card-body {
            padding: 30px;
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .card-text {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 10px;
        }

        .col-md-4 {
            margin-bottom: 30px;
        }

        /* Add some padding to the container */
        .container {
            padding-top: 50px;
        }

        /* Responsive Design for mobile */
        @media (max-width: 767px) {
            .col-md-4 {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
        <!-- Total Clients -->
<div class="col-md-4">
    <a href="http://localhost/pet_shop/admin/?page=maintenance/cline%20Show" class="text-decoration-none">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-users"></i> Total Clients</h5>
                <p id="total-clients" class="card-text"><?php echo $totalClients; ?></p>
            </div>
        </div>
    </a>
</div>

            
            <!-- Total Products -->
            <div class="col-md-4">
            <a href="http://localhost/pet_shop/admin/?page=product" class="text-decoration-none">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-box"></i> Total Products</h5>
                        <p id="total-products" class="card-text"><?php echo $totalProducts; ?></p>
                    </div>
                </div>
            </div>
            
           <!-- Total Orders -->
<div class="col-md-4">
    <a href="http://localhost/pet_shop/admin/?page=maintenance/order_info" class="text-decoration-none">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Total Orders</h5>
                <p id="total-orders" class="card-text"><?php echo $totalOrders; ?></p>
            </div>
        </div>
    </a>
</div>


       

            <!-- Total Blogs -->
            <div class="col-md-4">
            <a href="http://localhost/pet_shop/admin/?page=maintenance/add_blog" class="text-decoration-none">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-blog"></i> Total Blogs</h5>
                        <p id="total-blogs" class="card-text"><?php echo $totalBlogs; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
