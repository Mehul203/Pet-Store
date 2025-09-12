<?php
if(isset($_POST['inventory_id']) && isset($_POST['quantity_to_subtract'])) {
    $inventory_id = $_POST['inventory_id'];
    $quantity_to_subtract = $_POST['quantity_to_subtract'];

    // Assuming you have a database connection ($conn) already set up
    $qry = $conn->query("SELECT quantity FROM `inventory` WHERE id = '$inventory_id'");
    if($qry->num_rows > 0) {
        $row = $qry->fetch_assoc();
        $current_quantity = $row['quantity'];
        
        if ($quantity_to_subtract > $current_quantity) {
            echo json_encode(['status' => 'failed', 'msg' => 'Quantity to subtract exceeds current stock.']);
            exit;
        }

        // Deduct the quantity from the stock
        $new_quantity = $current_quantity - $quantity_to_subtract;
        $conn->query("UPDATE `inventory` SET quantity = '$new_quantity' WHERE id = '$inventory_id'");

        echo json_encode(['status' => 'success', 'msg' => 'Stock updated successfully.']);
    } else {
        echo json_encode(['status' => 'failed', 'msg' => 'Inventory not found.']);
    }
} else {
    echo json_encode(['status' => 'failed', 'msg' => 'Invalid input data.']);
}
?>
