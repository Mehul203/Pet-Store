<?php 
$products = $conn->query("SELECT * FROM `products` WHERE md5(id) = '{$_GET['id']}' ");
if($products->num_rows > 0){
    foreach($products->fetch_assoc() as $k => $v){
        $$k = $v;
    }
    $upload_path = base_app.'/uploads/product_'.$id;
    $img = "";
    if(is_dir($upload_path)){
        $fileO = scandir($upload_path);
        if(isset($fileO[2]))
            $img = "uploads/product_".$id."/".$fileO[2];
    }
    $inventory = $conn->query("SELECT * FROM inventory WHERE product_id = ".$id);
    $inv = array();
    while($ir = $inventory->fetch_assoc()){
        $inv[] = $ir;
    }
}
?>

<div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <!-- Product Images Section -->
        <div class="col-md-6">
            <img class="card-img-top mb-5 mb-md-0" loading="lazy" id="display-img" src="<?php echo validate_image($img) ?>" alt="Product Image" />
            <div class="mt-2 row gx-2 gx-lg-3 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                <?php 
                    foreach($fileO as $k => $img):
                        if(in_array($img, array('.', '..')))
                            continue;
                ?>
                    <a href="javascript:void(0)" class="view-image <?php echo $k == 2 ? "active" : '' ?>"><img src="<?php echo validate_image('uploads/product_'.$id.'/'.$img) ?>" loading="lazy" class="img-thumbnail" alt="Product Image"></a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="col-md-6">
            <div class="product-info-container">
                <!-- Product Name and Code -->
                <div class="product-header">
                    <h1 class="product-name-display"><?php echo $product_name ?></h1>
                    <div class="product-code">Product Code: #<?php echo $id ?></div>
                </div>

                <!-- Product Description Section -->
                    <div class="product-description">
                    <h5>Description :</h5>
                    <p class="product-name-display" style="font-size: 12px;"><?php echo $description ?></p>
 <!-- Display Product Description -->
                </div>

                <!-- Price and Stock Section -->
                <div class="product-status-container">
                    <div class="price-block">
                        <div class="current-price">
                            <span class="peso-sign">₹</span>
                            <span class="price-amount" id="price"><?php echo $inv[0]['price'] ?></span>
                        </div>
                        <div class="price-note">Inclusive of all taxes</div>
                    </div>
                    <div class="stock-block">
                        <div class="stock-status <?php echo $inv[0]['quantity'] > 0 ? 'in-stock' : 'out-of-stock' ?>">
                            <i class="bi bi-check2-circle"></i>
                            <span class="status-text"><?php echo $inv[0]['quantity'] > 0 ? 'In Stock' : 'Out of Stock' ?></span>
                        </div>
                        <div class="stock-count">
                            <span id="avail"><?php echo $inv[0]['quantity'] ?></span> units available
                        </div>
                    </div>
                </div>

                <!-- Size Selection Section -->
                <div class="size-selection">
                    <label class="size-label">Select Size:</label>
                    <div class="size-options">
                        <?php foreach($inv as $k => $v): ?>
                            <button class="size-btn <?php echo $k == 0 ? "active":'' ?>" data-id="<?php echo $k ?>">
                                <?php echo $v['size'] ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Add to Cart Section -->
                <form action="" id="add-cart">
                    <div class="purchase-controls">
                        <input type="hidden" name="price" value="<?php echo $inv[0]['price'] ?>">
                        <input type="hidden" name="inventory_id" value="<?php echo $inv[0]['id'] ?>">

                        <div class="quantity-selector">
                            <button type="button" class="qty-btn minus">-</button>
                            <input type="number" id="inputQuantity" name="quantity" value="1" min="1" max="<?php echo $inv[0]['quantity'] ?>">
                            <button type="button" class="qty-btn plus">+</button>
                        </div>

                        <button type="submit" class="cart-submit-btn">
                            <i class="bi bi-bag-plus"></i>
                            Add to Cart
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Related items section-->
<section class="related-products-section">
    <div class="container">
        <h4 class="section-title">Related Products</h4>
        <div class="row row-cols-3 row-cols-md-4 row-cols-xl-5 g-2">
            <?php 
            $products = $conn->query("SELECT * FROM `products` where status = 1 and (category_id = '{$category_id}' or sub_category_id = '{$sub_category_id}') and id !='{$id}' order by rand() limit 4 ");
            while($row = $products->fetch_assoc()):
                $upload_path = base_app.'/uploads/product_'.$row['id'];
                $img = "";
                if(is_dir($upload_path)){
                    $fileO = scandir($upload_path);
                    if(isset($fileO[2]))
                        $img = "uploads/product_".$row['id']."/".$fileO[2];
                    // var_dump($fileO);
                }
                $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                $_inv = array();
                while($ir = $inventory->fetch_assoc()){
                    $_inv[$ir['size']] = number_format($ir['price']);
                }
            ?>
            <div class="col">
                <div class="related-product-card">
                    <div class="product-img-wrapper">
                        <img src="<?php echo validate_image($img) ?>" class="product-img" alt="<?php echo $row['product_name'] ?>" />
                        <div class="hover-overlay">
                            <a class="view-btn" href=".?p=view_product&id=<?php echo md5($row['id']) ?>">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-name"><?php echo $row['product_name'] ?></h5>
                        <div class="size-price-info">
                            <?php foreach($_inv as $k=> $v): ?>
                            <div class="size-price">
                                <span class="size"><?php echo $k ?>:</span>
                                <span class="price">₹<?php echo $v ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<script>
    var inv = $.parseJSON('<?php echo json_encode($inv) ?>');
    $(function(){
        $('.view-image').click(function(){
            var _img = $(this).find('img').attr('src');
            $('#display-img').attr('src',_img);
            $('.view-image').removeClass("active")
            $(this).addClass("active")
        })
        $('.p-size').click(function(){
            var k = $(this).attr('data-id');
            $('.p-size').removeClass("active")
            $(this).addClass("active")
            $('#price').text(inv[k].price)
            $('[name="price"]').val(inv[k].price)
            $('#avail').text(inv[k].quantity)
            $('[name="inventory_id"]').val(inv[k].id)

        })

        $('#add-cart').submit(function(e){
            e.preventDefault();
            if('<?php echo $_settings->userdata('id') ?>' <= 0){
                uni_modal("","login.php");
                return false;
            }
            start_loader();
            $.ajax({
                url:'classes/Master.php?f=add_to_cart',
                data:$(this).serialize(),
                method:'POST',
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status=='success'){
                        alert_toast("Product added to cart.",'success')
                        $('#cart-count').text(resp.cart_count)
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader();
                }
            })
        })
    })
</script>
<!-- Google Font (Josefin Sans) -->
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    /* Ensure no extra margin or padding below the navbar */
.navbar {
    margin-bottom: 0 !important;
    padding-bottom: 0 !important;
}

/* Ensure no extra padding for the body or sections directly below */
body, .container, .row {
    margin-top: 0;
    padding-top: 0;
}

    /* Image size and format standardization */
    .card-img-top {
        width: 100%;
        height: 500px; /* Fixed height for main product image */
        object-fit: contain; /* Maintain aspect ratio without cropping */
        background: #f8f9fa; /* Light background for transparent images */
        padding: 1rem;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.12), 0 4px 8px rgba(0,0,0,0.06);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    /* Thumbnail gallery standardization */
    .mt-2.row {
        gap: 0.5rem;
        margin-top: 1rem !important;
    }

    .view-image {
        width: calc(25% - 0.5rem);
        aspect-ratio: 1/1;
        padding: 0.25rem;
        border-radius: 8px;
        overflow: hidden;
        display: block;
    }

    .img-thumbnail {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #f8f9fa;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    /* Related products image standardization */
    .related-product-card .product-img-wrapper {
        width: 100%;
        height: 200px; /* Fixed height for related product images */
        overflow: hidden;
        background:white;
        border-radius: 15px 15px 0 0;
    }

    .related-product-card .product-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 0.5rem;
        transition: transform 0.5s ease;
    }

    /* Apply Josefin Sans font to product name */
.product-name-display {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: #2d3436;
    margin-bottom: 0.5rem;
    line-height: 1.3;
    text-transform: capitalize;
}

/* Adjust font size for smaller screens */
@media (max-width: 768px) {
    .product-name-display {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .product-name-display {
        font-size: 1.5rem;
    }
}
    
.related-products-section {
    background: #f8f9fa;
    padding: 1rem 0;
    margin-top: 1rem;
}

.section-title {
    font-size: 1rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.8rem;
    text-align: center;
}

.related-product-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    transition: all 0.2s ease;
    height: 100%;
    max-width: 200px; /* Limit maximum width */
    margin: 0 auto; /* Center the card */
}

.related-product-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
}

.product-img-wrapper {
    position: relative;
    padding-top: 100%; /* Creates a square aspect ratio */
    background: #f8f9fa;
    overflow: hidden;
    max-height: 180px; /* Limit maximum height */
}

.product-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain; /* Changed to contain to prevent cropping */
    transition: transform 0.2s ease;
    padding: 0.5rem; /* Add some padding around the image */
}

.hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.2s ease;
}

.product-img-wrapper:hover .hover-overlay {
    opacity: 1;
}

.product-img-wrapper:hover .product-img {
    transform: scale(1.03);
}

.view-btn {
    background: white;
    color: #0d6efd;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 0.8rem;
    transform: translateY(10px);
    transition: all 0.2s ease;
}

.product-img-wrapper:hover .view-btn {
    transform: translateY(0);
}

.view-btn:hover {
    background: #0d6efd;
    color: white;
}

.product-info {
    padding: 0.5rem;
}

.product-name {
    font-size: 0.8rem;
    font-weight: 500;
    color: #2c3e50;
    margin-bottom: 0.3rem;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 1.2em;
}

.size-price-info {
    display: flex;
    flex-direction: column;
    gap: 0.2rem;
}

.size-price {
    font-size: 0.7rem;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.size {
    font-weight: 500;
    color: #495057;
}

.price {
    color: #0d6efd;
    font-weight: 500;
}

/* Grid Adjustments */
.g-2 {
    --bs-gutter-x: 0.5rem;
    --bs-gutter-y: 0.5rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .related-products-section {
        padding: 0.8rem 0;
    }
    
    .section-title {
        font-size: 0.9rem;
        margin-bottom: 0.6rem;
    }
    
    .product-name {
        font-size: 0.75rem;
    }
    
    .size-price {
        font-size: 0.65rem;
    }
    
    .view-btn {
        width: 24px;
        height: 24px;
        font-size: 0.7rem;
    }
    
    .related-product-card {
        max-width: 160px;
    }
    
    .product-img-wrapper {
        max-height: 140px;
    }
}

@media (max-width: 576px) {
    .related-product-card {
        max-width: 130px;
    }
    
    .product-img-wrapper {
        max-height: 120px;
    }
}

/* Container Adjustment */
.container {
    padding: 0 10px;
}

.product-info-container {
    padding: 1.5rem;
    background: #f8f9fa; /* Light gray background */
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.05);
}

/* Product Header Styles */
.product-header {
    margin-bottom: 2rem;
    border-bottom: 1px solid #dee2e6; /* Slightly darker border */
    padding-bottom: 1rem;
    background:white; /* White background */
    padding: 1rem;
    border-radius: 8px;
    margin: -1.5rem -1.5rem 1.5rem -1.5rem; /* Negative margin to extend to edges */
}

.product-name-display {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3436;
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.product-code {
    font-size: 0.8rem;
    color: #6c757d;
    font-weight: 400;
}

/* Price and Stock Section Styles */
.product-status-container {
    margin-bottom: 2rem;
    background: #ffffff; /* White background */
    padding: 1rem;
    border-radius: 8px;
}

.price-block {
    margin-bottom: 1rem;
}

.current-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3436;
}

.price-note {
    font-size: 0.8rem;
    color: #6c757d;
}

.stock-block {
    margin-bottom: 1rem;
}

.stock-status {
    margin-right: 0.5rem;
    padding: 0.2rem 0.5rem;
    border-radius: 0.25rem;
    background: #f0f0f0;
}

.in-stock {
    background: #d1ffd1;
    border: 1px solid #a3ffa3;
}

.out-of-stock {
    background: #ffd1d1;
    border: 1px solid #ffa3a3;
}

.status-text {
    font-weight: 500;
}

.stock-count {
    font-size: 0.8rem;
    color: #6c757d;
}

/* Size Selection Styles */
.size-selection {
    margin-bottom: 2rem;
    background: #ffffff; /* White background */
    padding: 1rem;
    border-radius: 8px;
}

.size-label {
    font-size: 0.8rem;
    font-weight: 500;
    color: #2d3436;
    margin-right: 0.5rem;
}

.size-options {
    display: flex;
    gap: 0.5rem;
}

.size-btn {
    padding: 0.5rem 1rem;
    border: 1px solid #0d6efd;
    border-radius: 0.25rem;
    background: none;
    color: #0d6efd;
    font-weight: 500;
    transition: all 0.2s ease;
}

.size-btn:hover {
    background: #0d6efd;
    color: white;
}

.size-btn.active {
    background: #0d6efd;
    color: white;
}

/* Add to Cart Section Styles */
.purchase-controls {
    background: #ffffff; /* White background */
    padding: 1rem;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.quantity-selector {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.qty-btn {
    padding: 0.5rem;
    border: 1px solid #0d6efd;
    border-radius: 0.25rem;
    background: none;
    color: #0d6efd;
    font-weight: 500;
    transition: all 0.2s ease;
}

.qty-btn:hover {
    background: #0d6efd;
    color: white;
}

.cart-submit-btn {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 0.25rem;
    background: #0d6efd;
    color: white;
    font-weight: 500;
    transition: all 0.2s ease;
}

.cart-submit-btn:hover {
    background: #0a58ca;
}
/* Main product image size adjustment */
#display-img {
    width: 100%; /* Ensure it fills the container */
    height: 300px; /* Smaller height */
    object-fit: contain; /* Keep the aspect ratio */
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Thumbnail gallery size adjustment */
.view-image {
    width: calc(20% - 0.5rem); /* Reduce width of thumbnails */
    aspect-ratio: 1/1;
    padding: 0.25rem;
    border-radius: 8px;
    overflow: hidden;
    display: block;
}

.view-image img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Maintain aspect ratio */
}

/* Adjust for related products card images */
.related-product-card .product-img-wrapper {
    height: 160px; /* Adjust height for related products */
}

.related-product-card .product-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 0.5rem;
    transition: transform 0.5s ease;
}
/* Product Info Container - Smaller Layout */
.product-info-container {
    padding: 1rem;  /* Reduced padding */
    background: #f8f9fa; /* Light gray background */
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);  /* Reduced box-shadow */
}

/* Product Header */
.product-header {
    margin-bottom: 1.5rem;  /* Reduced margin */
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 0.5rem;  /* Reduced padding */
}

/* Product Name */
.product-name-display {
    font-size: 1.5rem;  /* Reduced font-size */
    font-weight: 600;  /* Slightly lighter font-weight */
    color: #2d3436;
    margin-bottom: 0.3rem;  /* Reduced margin */
    line-height: 1.2;
    text-transform: capitalize;
}

/* Product Code */
.product-code {
    font-size: 0.75rem;  /* Smaller font size */
    color: #6c757d;
    font-weight: 400;
}

/* Price Section */
.price-block {
    margin-bottom: 1rem;  /* Reduced margin */
}

.current-price {
    font-size: 1.2rem;  /* Reduced price font size */
    font-weight: 700;
    color: #2d3436;
}

/* Stock Section */
.stock-block {
    margin-bottom: 1rem;
}

.stock-status {
    margin-right: 0.3rem;  /* Reduced space between stock status and quantity */
    padding: 0.2rem 0.4rem;  /* Smaller padding */
    font-size: 0.75rem;  /* Smaller text */
}

.in-stock {
    background: #d1ffd1;
    border: 1px solid #a3ffa3;
}

.out-of-stock {
    background: #ffd1d1;
    border: 1px solid #ffa3a3;
}

.stock-count {
    font-size: 0.75rem;  /* Smaller font size for stock count */
    color: #6c757d;
}

/* Size Selection */
.size-selection {
    margin-bottom: 1rem;  /* Reduced margin */
    background: #ffffff; /* White background */
    padding: 0.8rem;  /* Smaller padding */
    border-radius: 8px;
}

.size-label {
    font-size: 0.75rem;  /* Smaller font size */
    font-weight: 500;
    color: #2d3436;
}

.size-options {
    display: flex;
    gap: 0.5rem;
}

.size-btn {
    padding: 0.4rem 0.8rem;  /* Smaller button size */
    border: 1px solid #0d6efd;
    border-radius: 0.25rem;
    background: none;
    color: #0d6efd;
    font-weight: 500;
    font-size: 0.75rem;  /* Reduced font-size */
    transition: all 0.2s ease;
}

/* Quantity Selector */
.quantity-selector {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.qty-btn {
    padding: 0.3rem 0.6rem;  /* Smaller buttons */
    border: 1px solid #0d6efd;
    border-radius: 0.25rem;
    background: none;
    color: #0d6efd;
    font-weight: 500;
    font-size: 0.75rem;  /* Smaller font-size */
}

.cart-submit-btn {
    padding: 0.5rem 1rem;  /* Reduced padding */
    border: none;
    border-radius: 0.25rem;
    background: #0d6efd;
    color: white;
    font-weight: 500;
    font-size: 0.85rem;  /* Slightly smaller font size */
    transition: all 0.2s ease;
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
    .product-name-display {
        font-size: 1.25rem;  /* Smaller font size on medium screens */
    }

    .current-price {
        font-size: 1.1rem;  /* Smaller price font size on medium screens */
    }

    .size-btn {
        padding: 0.4rem 0.6rem;  /* Smaller button size on medium screens */
    }

    .cart-submit-btn {
        padding: 0.5rem 1rem;  /* Smaller button size on medium screens */
    }

    .product-code {
        font-size: 0.7rem;  /* Reduced font size */
    }
}

/* Responsive size adjustments for smaller screens */
@media (max-width: 576px) {
    .product-name-display {
        font-size: 1.1rem;  /* Smaller font size on small screens */
    }

    .size-btn {
        padding: 0.3rem 0.5rem;  /* Even smaller button size */
    }

    .cart-submit-btn {
        padding: 0.4rem 0.8rem;  /* Smaller button size */
    }

    .product-info-container {
        padding: 0.8rem;  /* Further reduced padding on small screens */
    }
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/loaders/GLTFLoader.js"></script>
<script>
    var imageIndex = 0;
    var images = []; // Store image sources

    // Gather all image sources into an array
    $('.view-image img').each(function() {
        images.push($(this).attr('src'));
    });

    // Function to change the image
    function changeImage() {
        // Increment the index, reset to 0 if at the end
        imageIndex = (imageIndex + 1) % images.length;

        // Set the new image as the main product image
        $('#display-img').attr('src', images[imageIndex]);

        // Optionally, update the active class in the thumbnails (optional)
        $('.view-image').removeClass("active");
        $('.view-image').eq(imageIndex).addClass("active");
    }

    // Set interval to change image every 5 seconds (5000 ms)
    setInterval(changeImage, 5000);

    // Optional: Set the first image to be active when the page loads
    $(document).ready(function() {
        changeImage();  // Call immediately to start with the first image
    });

    // Manually handle thumbnail clicks if needed
    $('.view-image').click(function() {
        var _img = $(this).find('img').attr('src');
        $('#display-img').attr('src', _img);
        $('.view-image').removeClass("active");
        $(this).addClass("active");
    });
</script>
