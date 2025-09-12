<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<style>
    .payment-methods {
      text-align: center;
      margin-top: 50px;
    }
    .payment-button {
      font-size: 18px;
      margin: 15px;
      padding: 10px 20px;
      width: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .payment-button img {
      margin-right: 15px;
      width: 40px;
      height: 40px;
    }
    .payment-container {
      text-align: center;
      margin-top: 50px;
    }
    .qr-code-container {
      margin-top: 20px;
    }
    .qr-code-container img {
      width: 250px;
      height: 250px;
      margin-bottom: 20px;
    }
    .payment-info {
      font-size: 18px;
      margin-top: 10px;
    }

          /* Center content vertically and horizontally */
          .container {
            justify-content: center;
            align-items: center;
        }
        .qr-container {
            display: none; /* Initially hidden */
            text-align: center;
        }
        .qr-container img {
            max-width: 200px; /* Ensure QR code isn't too large */
  
        }
        /* Basic textarea styles */
textarea.form-control {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

/* Valid input */
textarea.is-valid {
    border-color: #28a745;
    background-color: #d4edda;
}

/* Invalid input */
textarea.is-invalid {
    border-color: #dc3545;
    background-color: #f8d7da;
}

/* Add a hint or error message (optional) */
textarea.is-invalid::placeholder {
    color: #dc3545;
}

  </style>
<?php 
$total = 0;
    $qry = $conn->query("SELECT c.*,p.product_name,i.size,i.price,p.id as pid from `cart` c inner join `inventory` i on i.id=c.inventory_id inner join products p on p.id = i.product_id where c.client_id = ".$_settings->userdata('id'));
    while($row= $qry->fetch_assoc()):
        $total += $row['price'] * $row['quantity'];
    endwhile;
?>
<section class="py-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body"></div>
            <h3 class="text-center"><b>Checkout</b></h3>
            <hr class="border-dark">
            <form action="" id="place_order">
                <input type="hidden" name="amount" value="<?php echo $total ?>">
                <input type="hidden" name="payment_method" value="cod">
                <input type="hidden" name="paid" value="0">
                <div class="row row-col-1 justify-content-center">
                    <div class="col-6">
                        <textarea 
                        <textarea 
  id="delivery_address" 
  cols="30" 
  rows="3" 
  name="delivery_address" 
  class="form-control" 
  style="resize:none" 
  required 
  minlength="10" 
  placeholder="Enter your delivery address"
  oninput="validateTextarea(this)">
<?php echo $_settings->userdata('default_delivery_address') ?>
</textarea>


                        <div class="col">
                            <span><h4><b>Final Count:</b> <?php echo number_format($total) ?></h4></span>
                        </div>
                        <hr>
                        <div class="col my-3">
  <!-- Bootstrap 5 CDN for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Google Material Icons for the logos -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <div class="container">
    <div class="payment-methods">
      <h2>Choose Your Payment Method</h2>
      
      <!-- Google Pay Button with Logo -->
      <a href="https://pay.google.com" class="btn btn-outline-primary payment-button" target="_blank">
        <img src="img/icons8-google-pay-96.png" alt="Google Pay ">
        Pay with Google Pay
      </a>
      <a href="https://pay.google.com" class="btn btn-outline-primary payment-button" target="_blank">
        <img src="img/icons8-paypal-96.png" alt="Google Pay ">
        Pay with Paypal
      </a>
      
      <!-- PhonePe Button with Logo -->
      <a href="https://www.phonepe.com" class="btn btn-outline-success payment-button" target="_blank">
        <img src="img/icons8-phone-pe-96.png" alt="PhonePe ">
        Pay with PhonePe
      </a>
      
      <!-- Paytm Button with Logo -->
      <a href="https://paytm.com" class="btn btn-outline-danger payment-button" target="_blank">
        <img src="img/icons8-paytm-96.png" alt="Paytm ">
        Pay with Paytm
      </a>
      <button class="btn btn-outline-dark payment-button">
      <img src="img/icons8-cash-on-delivery-64.png" alt="Paytm ">
      Cash On Delivery
</button>
    </div>
    
  </div>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <div class="container">
    <div class="payment-container">
      <h2>Pay with QR Code</h2>
      <!-- Payment Instructions -->
      <div class="payment-info">
     
  <div class="container">
    <div class="text-center">
      <!-- Button to show the QR code -->
      <a href="#" id="show-qr-btn" class="btn btn-primary my-4">Click to Show QR Code</a>
      
      <!-- QR Code container -->
      <div id="qr-container" class="qr-container">
        <img src="img/Qr-Cod.jpg" alt="QR Code">
      </div>
    </div>
  </div>
        <!--QR Code -->
        <p>Make sure your payment app (like Google Pay, PhonePe, Paytm, etc.) is ready to scan.</p>
      </div>
      
      <!-- Button to Show More Info (Optional) -->
      <a href="#" id=""data-bs-toggle="modal" data-bs-target="#moreInfoModal" class="btn btn-primary my-4">More Info</a>

      <!-- Modal for Additional Info (Optional) -->
      <div class="modal fade" id="moreInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">How to Pay Using QR Code</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <ul>
                <li>Open your preferred payment app (e.g., Google Pay, PhonePe, Paytm, etc.).</li>
                <li>Click on the "Scan" button.</li>
                <li>Point your phone camera at the QR code above to scan it.</li>
                <li>Follow the instructions to complete the payment.</li>
              </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

<!-- JavaScript to handle button click and show the QR code -->
<script>
    document.getElementById('show-qr-btn').addEventListener('click', function() {
        // Show the QR code container when button is clicked
        document.getElementById('qr-container').style.display = 'block';
    });
</script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,
 
        //app's client id's
	client: {
        sandbox:    'AdDNu0ZwC3bqzdjiiQlmQ4BRJsOarwyMVD_L4YQPrQm4ASuBg4bV5ZoH-uveg8K_l9JLCmipuiKt4fxn',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },
 
    commit: true, // Show a 'Pay Now' button
 
    style: {
    	color: 'blue',
    	size: 'small'
    },
 
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: '<?php echo $total; ?>', 
                        	currency: 'PHP' 
                        }
                    }
                ]
            }
        });
    },
 
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
    		// //sweetalert for successful transaction
    		// swal('Thank you!', 'Paypal purchase successful.', 'success');
            payment_online()
        });
    },
 
}, '#paypal-button');

function payment_online(){
    $('[name="payment_method"]').val("Online Payment")
    $('[name="paid"]').val(1)
    $('#place_order').submit()
}
$(function(){
    $('#place_order').submit(function(e){
        e.preventDefault()
        start_loader();
        $.ajax({
            url:'classes/Master.php?f=place_order',
            method:'POST',
            data:$(this).serialize(),
            dataType:"json",
            error:err=>{
                console.log(err)
                alert_toast("an error occured","error")
                end_loader();
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                    alert_toast("Order Successfully placed.","success")
                    setTimeout(function(){
                        location.replace('./')
                    },2000)
                }else{
                    console.log(resp)
                    alert_toast("an error occured","error")
                    end_loader();
                }
            }
        })
    })
})
</script>
<script>
function validateTextarea(textarea) {
    if (textarea.validity.valid) {
        textarea.classList.remove('is-invalid');
        textarea.classList.add('is-valid');
    } else {
        textarea.classList.remove('is-valid');
        textarea.classList.add('is-invalid');
    }
}
</script>
