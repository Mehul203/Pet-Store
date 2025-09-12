<section class="py-2">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="w-100 justify-content-between d-flex">
                    <h4><b>Orders</b></h4>
                    <a href="./?p=edit_account" class="btn btn-dark btn-flat"><div class="fa fa-user-cog"></div> Manage Account</a>
                </div>
                <hr class="border-warning">
                <table class="table table-striped text-dark">
                    <colgroup>
                        <col width="5%">
                        <col width="10%">
                        <col width="20%">
                        <col width="20%">
                        <col width="10%">
                        <col width="10%">
                        <col width="25%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DateTime</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                            <th>Client Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            $qry = $conn->query("SELECT o.*, CONCAT(c.firstname, ' ', c.lastname) AS client 
                                                 FROM `orders` o 
                                                 INNER JOIN clients c ON c.id = o.client_id 
                                                 WHERE o.client_id = '".$_settings->userdata('id')."' 
                                                 ORDER BY unix_timestamp(o.date_created) DESC");

                            while($row = $qry->fetch_assoc()): 
                        ?>
                            <tr data-id="<?php echo $row['id']; ?>">
                                <td><?php echo $i++ ?></td>
                                <td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                <td><a href="javascript:void(0)" class="view_order" data-id="<?php echo $row['id'] ?>"><?php echo md5($row['id']); ?></a></td>
                                <td><?php echo number_format($row['amount']) ?> </td>
                                <td class="text-center">
                                    <?php if($row['status'] == 0): ?>
                                        <span class="badge badge-light text-dark">Pending</span>
                                    <?php elseif($row['status'] == 1): ?>
                                        <span class="badge badge-primary">Packed</span>
                                    <?php elseif($row['status'] == 2): ?>
                                        <span class="badge badge-warning">Out for Delivery</span>
                                    <?php elseif($row['status'] == 3): ?>
                                        <span class="badge badge-success">Delivered</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Cancelled</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($row['status'] == 0): ?>
                                        <button type="button" class="btn btn-danger btn-sm rounded-0 cancel-order" data-id="<?php echo $row['id']; ?>">
                                            <i class="fa fa-times"></i> Cancel
                                        </button>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['client'] ?: 'Unknown Client'); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    function cancel_order(order_id){
        Swal.fire({
            title: 'Cancel Order',
            html: `
                <p>Please select a reason for cancellation:</p>
                <select id="cancelReason" class="form-control">
                    <option value="">-- Select Reason --</option>
                    <option value="Changed my mind">Changed my mind</option>
                    <option value="Wrong item ordered">Wrong item ordered</option>
                    <option value="Delivery time too long">Delivery time too long</option>
                    <option value="Found better price elsewhere">Found better price elsewhere</option>
                    <option value="Ordered by mistake">Ordered by mistake</option>
                    <option value="Other">Other</option>
                </select>
                <textarea id="otherReason" class="form-control mt-2" style="display:none;" placeholder="Please specify your reason"></textarea>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, cancel it!',
            cancelButtonText: 'No, keep it',
            preConfirm: () => {
                const reason = document.getElementById('cancelReason').value;
                const otherReason = document.getElementById('otherReason').value;
                if (!reason) {
                    Swal.showValidationMessage('Please select a reason');
                    return false;
                }
                if (reason === 'Other' && !otherReason) {
                    Swal.showValidationMessage('Please specify your reason');
                    return false;
                }
                return {
                    reason: reason === 'Other' ? otherReason : reason
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                start_loader();
                $.ajax({
                    url: _base_url_ + "classes/Master.php?f=update_order_status",
                    method: "POST",
                    data: {
                        id: order_id,
                        status: 5,
                        cancel_reason: result.value.reason
                    },
                    dataType: "json",
                    error: err => {
                        console.log(err);
                        alert_toast("An error occurred", 'error');
                        end_loader();
                    },
                    success: function(resp) {
                        if (typeof resp == 'object' && resp.status == 'success') {
                            Swal.fire(
                                'Cancelled!',
                                'Your order has been cancelled.',
                                'success'
                            ).then(() => {
                                // Dynamically remove the canceled row from the table
                                $('tr[data-id="'+order_id+'"]').fadeOut();
                            });
                        } else {
                            alert_toast("An error occurred", 'error');
                        }
                        end_loader();
                    }
                });
            }
        });
    }

    $(function() {
        // View order details modal
        $('.view_order').click(function() {
            uni_modal("Order Details", "./admin/orders/view_order.php?view=user&id=" + $(this).attr('data-id'), 'large');
        });

        // Handle cancel order button click
        $('.cancel-order').click(function() {
            const order_id = $(this).attr('data-id');
            if (confirm("Are you sure you want to cancel this order?")) {
                cancel_order(order_id);
            }
        });

        // Initialize data tables (optional)
        $('table').dataTable();
    });

    $(document).on('change', '#cancelReason', function() {
        if ($(this).val() === 'Other') {
            $('#otherReason').show();
        } else {
            $('#otherReason').hide().val(''); // Hide and clear text
        }
    });
</script>

<style>
    /* Optional: Styling for better spacing */
    table td, table th {
        padding: 8px;
        text-align: center;  /* Center-aligning for better layout */
    }

    /* Optional: Styling for the action button */
    .cancel-order {
        padding: 4px 10px;  /* Slightly more padding for the cancel button */
    }
</style>
