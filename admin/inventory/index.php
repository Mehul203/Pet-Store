<style>
    /* Custom Styling */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    /* Add custom styles for the status badges */
    .badge-success {
        background-color: #28a745; /* Green for Available */
    }

    .badge-danger {
        background-color: #dc3545; /* Red for Sold Out */
    }
</style>

<?php if ($_settings->chk_flashdata('success')) : ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Inventory</h3>
        <div class="card-tools">
            <a href="?page=inventory/manage_inventory" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped">
                <colgroup>
                    <col width="5%">
                    <col width="25%">
                    <col width="10%">
                    <col width="10%">
                    <col width="20%">
                    <col width="20%">
                    <col width="10%">
                    <col width="10%"> <!-- Added column for status -->
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product <i class="fas fa-sort"></i></th>
                        <th>Unit <i class="fas fa-sort"></i></th>
                        <th>Size <i class="fas fa-sort"></i></th>
                        <th>Price <i class="fas fa-sort"></i></th>
                        <th>Stock <i class="fas fa-sort"></i></th>
                        <th>Status <i class="fas fa-sort"></i></th> <!-- Status Column -->
                        <th>Action <i class="fas fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    $qry = $conn->query("SELECT i.*, p.product_name as product FROM `inventory` i INNER JOIN `products` p ON p.id = i.product_id ORDER BY UNIX_TIMESTAMP(i.date_created) DESC");
                    while ($row = $qry->fetch_assoc()) :
                        $sold = $conn->query("SELECT SUM(ol.quantity) as sold FROM order_list ol INNER JOIN orders o ON o.id = ol.order_id WHERE ol.product_id='{$row['id']}' AND o.`status` != 4");
                        $sold = $sold->num_rows > 0 ? $sold->fetch_assoc()['sold'] : 0;
                        $avail = $row['quantity'] - $sold;
                        $avail = max($avail, 0); // Ensure availability does not go below zero

                        // Determine product status based on availability
                        $status = $avail > 0 ? "Available" : "Sold Out";
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo $row['product'] ?></td>
                            <td><?php echo $row['unit'] ?></td>
                            <td><?php echo $row['size'] ?></td>
                            <td class="text-right"><?php echo number_format($row['price']) ?></td>
                            <td class="text-right"><?php echo $avail ?></td>
                            <td class="text-center">
                                <?php if ($status == "Sold Out") : ?>
                                    <span class="badge badge-danger"><?php echo $status; ?></span> <!-- Red badge for Sold Out -->
                                <?php else : ?>
                                    <span class="badge badge-success"><?php echo $status; ?></span> <!-- Green badge for Available -->
                                <?php endif; ?>
                            </td>
                            <td align="center">
                                <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Action
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="?page=inventory/manage_inventory&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this inventory permanently?", "delete_inventory", [$(this).attr('data-id')])
        })
        $('.table').dataTable();
    });

    function delete_inventory($id){
        start_loader();
        $.ajax({
            url: _base_url_+"classes/Master.php?f=delete_inventory",
            method: "POST",
            data: { id: $id },
            dataType: "json",
            error: err => {
                console.log(err);
                alert_toast("An error occurred.", 'error');
                end_loader();
            },
            success: function(resp){
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.reload();
                } else {
                    alert_toast("An error occurred.", 'error');
                    end_loader();
                }
            }
        });
    }
</script>

<?php 
// Update stock when an order is placed, canceled, or deleted.
// Example of stock update for order cancellation:
if (isset($_POST['cancel_order_id'])) {
    // Revert stock quantity upon order cancellation
    $order_id = $_POST['cancel_order_id'];
    $order = $conn->query("SELECT * FROM order_list WHERE order_id = $order_id");
    
    while ($order_row = $order->fetch_assoc()) {
        // Get the quantity of the canceled product
        $quantity = $order_row['quantity'];
        $product_id = $order_row['product_id'];

        // Increment the stock for the canceled product
        $conn->query("UPDATE inventory SET quantity = quantity + $quantity WHERE product_id = $product_id");
    }
    
    // Update order status to canceled (example: assuming status 4 is canceled)
    $conn->query("UPDATE orders SET status = 4 WHERE id = $order_id");

    echo json_encode(['status' => 'success']);
}
?>
