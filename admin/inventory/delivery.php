<?php
// Check if the required parameters are available
if (isset($_POST['inventory_id']) && isset($_POST['quantity'])) {
    $inventory_id = $_POST['inventory_id'];
    $delivery_quantity = $_POST['quantity'];

    // Check if the quantity is valid
    if ($delivery_quantity <= 0) {
        echo json_encode(['status' => 'failed', 'msg' => 'Invalid delivery quantity']);
        exit;
    }

    // Fetch the current quantity of the inventory
    $qry = $conn->query("SELECT quantity FROM `inventory` WHERE id = '$inventory_id'");
    if ($qry->num_rows > 0) {
        $row = $qry->fetch_assoc();
        $current_quantity = $row['quantity'];

        // Update the inventory with the new quantity (adding the delivery quantity)
        $new_quantity = $current_quantity + $delivery_quantity;
        if ($conn->query("UPDATE `inventory` SET quantity = '$new_quantity' WHERE id = '$inventory_id'")) {
            echo json_encode(['status' => 'success', 'msg' => 'Stock updated successfully']);
        } else {
            echo json_encode(['status' => 'failed', 'msg' => 'Failed to update stock in the database']);
        }
    } else {
        echo json_encode(['status' => 'failed', 'msg' => 'Inventory item not found']);
    }
} else {
    echo json_encode(['status' => 'failed', 'msg' => 'Invalid input data']);
}
?>
