<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "pet_shop_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch order details
$sql = "SELECT id, client_id, delivery_address, payment_method, amount, date_updated, status, paid, date_created FROM orders ORDER BY date_created DESC";

// Execute query and get results
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Orders</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .table th, .table td {
            text-align: center;
        }

        .table {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table tfoot {
            font-weight: bold;
            background-color: #f1f1f1;
        }
        h2{
            color:white;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Orders List</h2>

        <?php if ($result->num_rows > 0) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client ID</th>
                        <th>Delivery Address</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Date Updated</th>
                        <th>Status</th>
                        <th>Paid</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['client_id']; ?></td>
                            <td><?php echo $row['delivery_address']; ?></td>
                            <td><?php echo $row['payment_method']; ?></td>
                            <td><?php echo number_format($row['amount'], 2); ?></td>
                            <td><?php echo $row['date_updated']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['paid'] == 1 ? 'Yes' : 'No'; ?></td>
                            <td><?php echo $row['date_created']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9" class="text-center">Total Orders: <?php echo $result->num_rows; ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php else : ?>
            <p class="text-center">No orders found.</p>
        <?php endif; ?>

        <?php
        // Close the connection
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
