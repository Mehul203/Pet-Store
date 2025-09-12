<div class="form-group">
    <label for="delivery_quantity" class="control-label">Enter Delivery Quantity</label>
    <input type="number" class="form-control" id="delivery_quantity" name="delivery_quantity" required>
</div>
<button class="btn btn-flat btn-warning" id="process-delivery">Process Delivery</button>

<script>
    $('#process-delivery').click(function(e){
        e.preventDefault();

        var delivery_quantity = $('#delivery_quantity').val();
        var inventory_id = '<?php echo $id; ?>'; // Inventory ID

        if (!delivery_quantity || delivery_quantity <= 0) {
            alert('Please enter a valid quantity.');
            return;
        }

        $.ajax({
            url: 'process_inventory.php',  // PHP file for updating inventory
            method: 'POST',
            data: {
                inventory_id: inventory_id,
                quantity: delivery_quantity
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert('Inventory updated successfully');
                    location.reload();  // Reload the page to show updated quantity
                } else {
                    alert('Error: ' + response.msg);
                }
            },
            error: function(err) {
                alert('An error occurred');
                console.log(err);
            }
        });
    });
</script>
