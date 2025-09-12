<?php
// Assuming you're using MySQLi
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inventory_id = $_POST['inventory_id'];
    $quantity = $_POST['quantity'];

    // Check if the required fields are present
    if (!isset($inventory_id) || !isset($quantity)) {
        echo json_encode(['status' => 'failed', 'msg' => 'Missing required fields.']);
        exit();
    }

    // Sanitize inputs to prevent SQL injection
    $inventory_id = intval($inventory_id);
    $quantity = floatval($quantity);

    // Validate data
    if ($quantity <= 0) {
        echo json_encode(['status' => 'failed', 'msg' => 'Invalid quantity.']);
        exit();
    }

    // Assuming you are updating an inventory record
    $stmt = $conn->prepare("UPDATE `inventory` SET `quantity` = `quantity` + ? WHERE `id` = ?");
    $stmt->bind_param("di", $quantity, $inventory_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'msg' => 'Inventory updated successfully.']);
    } else {
        // Return the MySQL error
        echo json_encode(['status' => 'failed', 'msg' => 'Error updating inventory: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'failed', 'msg' => 'Invalid request method.']);
}
?>
