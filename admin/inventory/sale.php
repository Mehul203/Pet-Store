<?php
// Check if the required parameters are available
if (isset($_POST['inventory_id']) && isset($_POST['quantity'])) {
    $inventory_id = $_POST['inventory_id'];
    $sale_quantity = $_POST['quantity'];

    // Check if the quantity is valid
    if ($sale_quantity <= 0) {
        echo json_encode(['status' => 'failed', 'msg' => 'Invalid sale quantity']);
        exit;
    }

    // Fetch the current quantity of the inventory
    $qry = $conn->query("SELECT quantity FROM `inventory` WHERE id = '$inventory_id'");
    if ($qry->num_rows > 0) {
        $row = $qry->fetch_assoc();
        $current_quantity = $row['quantity'];

        // Check if there's enough stock for the sale
        if ($current_quantity < $sale_quantity) {
            echo json_encode(['status' => 'failed', 'msg' => 'Not enough stock for the sale']);
            exit;
        }

        // Update the inventory by subtracting the sale quantity
        $new_quantity = $current_quantity - $sale_quantity;
        if ($conn->query("UPDATE `inventory` SET quantity = '$new_quantity' WHERE id = '$inventory_id'")) {
            echo json_encode(['status' => 'success', 'msg' => 'Stock updated after sale']);
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
