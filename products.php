<?php 
$title = "Your Pets Deserve The Best";
$sub_title = "Explore our products for your pet.";
if(isset($_GET['c']) && isset($_GET['s'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
    $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $sub_title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
elseif(isset($_GET['c'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
}
elseif(isset($_GET['s'])){
    $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
?>
<!-- Header-->
<header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder"><?php echo $title ?></h1>
            <p class="lead fw-normal text-white-50 mb-0"><?php echo $sub_title ?></p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container-fluid px-4 px-lg-5 mt-5">
        <?php 
            if(isset($_GET['search'])){
                echo "<h4 class='text-center'><b>Search Result for '".$_GET['search']."'</b></h4>";
            }
        ?>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
                $whereData = "";
                if(isset($_GET['search']))
                    $whereData = " and (product_name LIKE '%{$_GET['search']}%' or description LIKE '%{$_GET['search']}%')";
                elseif(isset($_GET['c']) && isset($_GET['s']))
                    $whereData = " and (md5(category_id) = '{$_GET['c']}' and md5(sub_category_id) = '{$_GET['s']}')";
                elseif(isset($_GET['c']))
                    $whereData = " and md5(category_id) = '{$_GET['c']}' ";
                elseif(isset($_GET['s']))
                    $whereData = " and md5(sub_category_id) = '{$_GET['s']}' ";
                $products = $conn->query("SELECT * FROM `products` where status = 1 {$whereData} order by rand() ");
                while($row = $products->fetch_assoc()):
                    $upload_path = base_app.'/uploads/product_'.$row['id'];
                    $img = "";
                    if(is_dir($upload_path)){
                        $fileO = scandir($upload_path);
                        if(isset($fileO[2]))
                            $img = "uploads/product_".$row['id']."/".$fileO[2];
                    }
                    $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                    $inv = array();
                    while($ir = $inventory->fetch_assoc()){
                        $inv[$ir['size']] = number_format($ir['price']);
                    }
            ?>
            <div class="col mb-5">
                <div class="card h-100 product-item">
                    <!-- Product image and icon -->
                    <div class="position-relative">
                        <img class="card-img-top" src="<?php echo validate_image($img) ?>" loading="lazy" alt="Product Image" />
                        <a href=".?p=view_product&id=<?php echo md5($row['id']) ?>" class="view-icon">
                            <span class="material-icons">visibility</span>
                        </a>
                    </div>
                    <!-- Product details -->
                    <div class="card-body p-3">
                        <div class="text-center">
                            <h5 class="fw-bolder"><?php echo $row['product_name'] ?></h5>
                            <?php foreach($inv as $k => $v): ?>
                                <span><b><?php echo $k ?>: </b><span class="price-blue">₹ <?php echo $v ?></span></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php 
                if($products->num_rows <= 0){
                    echo "<h4 class='text-center'><b>No Product Listed.</b></h4>";
                }
            ?>
        </div>
    </div>
</section>

<style>
.product-item {
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 8px;
    overflow: hidden;
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-height: 250px;
}

.product-item:hover {
    transform: scale(1.03);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.product-item img {
    width: 100%; /* Make the image fill the width of the container */
    max-height: 150px; /* Constrain the image height */
    object-fit: contain; /* Ensure the image does not stretch, and maintain its aspect ratio */
    display: block;
}

.view-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 35px;
    height: 35px;
    background-color: rgba(255, 255, 255, 0.95);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    text-decoration: none;
}

.product-item:hover .view-icon {
    opacity: 1;
}

.view-icon .material-icons {
    font-size: 18px;
    color: #007bff;
}

.card-body h5.fw-bolder {
    font-size: 0.85rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.card-body span {
    display: block;
    font-size: 0.75rem;
    margin-bottom: 0.3rem;
    color: #555;
}

.card-body span b {
    font-size: 0.85rem;
    color: #333;
}

.card-body span .price-blue {
    color: blue;
    font-weight: bold;
    font-size: 1rem;
}

.col {
    flex: 0 0 auto;
    width: 16.666%;
    padding: 8px;
}

@media (max-width: 1200px) {
    .col { width: 20%; }
}

@media (max-width: 992px) {
    .col { width: 25%; }
}

@media (max-width: 768px) {
    .col { width: 33.333%; }
}

@media (max-width: 576px) {
    .col { width: 50%; }
}
</style>

<!-- Add this in your header if not already present -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
