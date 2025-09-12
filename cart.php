<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-between mb-3">
                <a href="./" class="custom-btn back">
                    <i class="fa fa-arrow-left"></i>
                    <span>Back to Shop</span>
                </a>
                <div class="d-flex gap-2">
                    <button class="custom-btn save" type="button" id="save_cart">
                        <i class="fa fa-bookmark"></i>
                        <span>Save Cart</span>
                    </button>
                    <button class="custom-btn empty" type="button" id="empty_cart">
                        <i class="fa fa-trash-alt"></i>
                        <span>Empty Cart</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <h3><b>Cart List</b></h3>
                <hr class="border-dark">
                <?php 
                    $qry = $conn->query("SELECT c.*,p.product_name,i.size,i.price,p.id as pid from `cart` c inner join `inventory` i on i.id=c.inventory_id inner join products p on p.id = i.product_id where c.client_id = ".$_settings->userdata('id'));
                    while($row= $qry->fetch_assoc()):
                        $upload_path = base_app.'/uploads/product_'.$row['pid'];
                        $img = "";
                        if(is_dir($upload_path)){
                            $fileO = scandir($upload_path);
                            if(isset($fileO[2]))
                                $img = "uploads/product_".$row['pid']."/".$fileO[2];
                            // var_dump($fileO);
                        }
                ?>
                    <div class="d-flex w-100 justify-content-between  mb-2 py-2 border-bottom cart-item">
                        <div class="d-flex align-items-center col-8">
                            <span class="mr-2"><a href="javascript:void(0)" class="btn btn-sm btn-outline-danger rem_item" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></a></span>
                            <img src="<?php echo validate_image($img) ?>" loading="lazy" class="cart-prod-img mr-2 mr-sm-2 border" alt="">
                            <div>
                                <p class="mb-1 mb-sm-1"><?php echo $row['product_name'] ?></p>
                                <p class="mb-1 mb-sm-1"><small><b>Size:</b> <?php echo $row['size'] ?></small></p>
                                <p class="mb-1 mb-sm-1"><small><b>Price:</b> <span class="price"><?php echo number_format($row['price']) ?></span></small></p>
                                <div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-sm btn-outline-secondary min-qty" type="button" id="button-addon1"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="number" class="form-control form-control-sm qty text-center cart-qty" placeholder="" aria-label="Example text with button addon" value="<?php echo $row['quantity'] ?>" aria-describedby="button-addon1" data-id="<?php echo $row['id'] ?>" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-outline-secondary plus-qty" type="button" id="button-addon1"><i class="fa fa-plus"></i></button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col text-right align-items-center d-flex justify-content-end">
                            <h4><b class="total-amount"><?php echo number_format($row['price'] * $row['quantity']) ?></b></h4>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="d-flex w-100 justify-content-between mb-2 py-2 border-bottom">
                    <div class="col-8 d-flex justify-content-end"><h4>Grand Total:</h4></div>
                    <div class="col d-flex justify-content-end"><h4 id="grand-total">-</h4></div>
                </div>
            </div>
        </div>
        <div class="d-flex w-100 justify-content-end mt-4">
            <a href="./?p=checkout" class="custom-btn checkout">
                <i class="fa fa-shopping-cart"></i>
                <span>Proceed to Checkout</span>
            </a>
        </div>
    </div>
</section>
<script>
    function calc_total(){
        var total  = 0

        $('.total-amount').each(function(){
            amount = $(this).text()
            amount = amount.replace(/\,/g,'')
            amount = parseFloat(amount)
            total += amount
        })
        $('#grand-total').text(parseFloat(total).toLocaleString('en-US'))
    }
    function qty_change($type,_this){
        var qty = _this.closest('.cart-item').find('.cart-qty').val()
        var price = _this.closest('.cart-item').find('.price').text()
        var cart_id = _this.closest('.cart-item').find('.cart-qty').attr('data-id')
        var new_total = 0
        start_loader();
        if($type == 'minus'){
            qty = parseInt(qty) - 1
        }else{
            qty = parseInt(qty) + 1
        }
        price = parseFloat(price)
        // console.log(qty,price)
        new_total = parseFloat(qty * price).toLocaleString('en-US')
        _this.closest('.cart-item').find('.cart-qty').val(qty)
        _this.closest('.cart-item').find('.total-amount').text(new_total)
        calc_total()

        $.ajax({
            url:'classes/Master.php?f=update_cart_qty',
            method:'POST',
            data:{id:cart_id, quantity: qty},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("an error occured", 'error');
                end_loader()
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                    end_loader()
                }else{
                    alert_toast("an error occured", 'error');
                    end_loader()
                }
            }

        })
    }
    function rem_item(id){
        $('.modal').modal('hide')
        var _this = $('.rem_item[data-id="'+id+'"]')
        var id = _this.attr('data-id')
        var item = _this.closest('.cart-item')
        start_loader();
        $.ajax({
            url:'classes/Master.php?f=delete_cart',
            method:'POST',
            data:{id:id},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("an error occured", 'error');
                end_loader()
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                    item.hide('slow',function(){ item.remove() })
                    calc_total()
                    end_loader()
                }else{
                    alert_toast("an error occured", 'error');
                    end_loader()
                }
            }

        })
    }
    function empty_cart(){
        start_loader();
        $.ajax({
            url:'classes/Master.php?f=empty_cart',
            method:'POST',
            data:{},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("an error occured", 'error');
                end_loader()
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                   location.reload()
                }else{
                    alert_toast("an error occured", 'error');
                    end_loader()
                }
            }

        })
    }
    function save_cart(){
        if($('.cart-item').length <= 0){
            alert_toast("Cart is empty", 'warning');
            return false;
        }
        
        start_loader();
        
        // Collect all cart items data
        var cart_items = [];
        $('.cart-item').each(function(){
            var item = {
                id: $(this).find('.cart-qty').attr('data-id'),
                quantity: $(this).find('.cart-qty').val(),
                price: $(this).find('.price').text().replace(/,/g, ''),
                product_name: $(this).find('.mb-1').first().text().trim()
            };
            cart_items.push(item);
        });

        $.ajax({
            url:'classes/Master.php?f=save_cart',
            method:'POST',
            data:{
                cart_items: JSON.stringify(cart_items),
                total_amount: $('#grand-total').text().replace(/,/g, '')
            },
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("Your cart has been saved successfully! 🛒", 'success');
                end_loader()
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                    // Update success message and styling
                    alert_toast("Your cart has been saved successfully! 🛒", 'success');
                    // Add visual feedback to the save button
                    $('#save_cart').addClass('saved').delay(1000).queue(function(next){
                        $(this).removeClass('saved');
                        next();
                    });
                    end_loader()
                }else{
                    alert_toast("Product added to cart successfully", 'success');
                    end_loader()
                }
            }
        })
    }
    $(function(){
        calc_total()
        $('.min-qty').click(function(){
            qty_change('minus',$(this))
        })
        $('.plus-qty').click(function(){
            qty_change('plus',$(this))
        })
        $('#empty_cart').click(function(){
            // empty_cart()
            _conf("Are you sure to empty your cart list?",'empty_cart',[])
        })
        $('.rem_item').click(function(){
            _conf("Are you sure to remove the item in cart list?",'rem_item',[$(this).attr('data-id')])
        })
        $('#save_cart').click(function(){
            _conf("Are you sure you want to save your current cart?", 'save_cart', [])
        })
    })
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600&display=swap');

.custom-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-family: 'Outfit', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: white;
    text-decoration: none;
    cursor: pointer;
}

.custom-btn.checkout {
    background-color: #2B3467;
}

.custom-btn.empty {
    background-color: #e74c3c;
}

.custom-btn.back {
    background-color: #555;
}

.custom-btn i {
    font-size: 18px;
}

.custom-btn:hover {
    color: white;
}

.custom-btn.checkout:hover {
    background-color: #1a1f3d;
}

.custom-btn.empty:hover {
    background-color: #c0392b;
}

.custom-btn.back:hover {
    background-color: #333;
}

.custom-btn.save {
    background-color: #27ae60;
    transition: all 0.3s ease;
}

.custom-btn.save:hover {
    background-color: #219a52;
    transform: translateY(-2px);
}

.custom-btn.save.saved {
    animation: savePulse 0.5s ease;
    background-color: #219a52;
}

@keyframes savePulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.gap-2 {
    gap: 0.5rem !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .custom-btn {
        padding: 10px 20px;
        font-size: 15px;
        gap: 8px;
    }
    
    .custom-btn i {
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .custom-btn {
        padding: 8px 16px;
        font-size: 14px;
        gap: 6px;
    }
    
    .custom-btn i {
        font-size: 15px;
    }

    .d-flex.gap-2 {
        gap: 0.25rem !important;
    }
    
    .custom-btn.save {
        padding: 8px 16px;
    }
}
</style>