<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    /* Set body background color and remove padding */
    
    .product-slider-container{}
    body {
        background-color: #f4f4f4; /* Example background color */
        padding: 0;
        margin: 0;
    }

    /* Product Slider Section */
    .product-slider-container {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .product-slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
        gap: 15px; /* Add some space between the products */
    }

    .product-slide {
        display: flex;
        justify-content: space-between;
        flex: 0 0 100%;
    }

    .product-item {
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        padding: 0;
        position: relative;
    }

    .product-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .product-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
        margin: 0 auto;
    }

    .view-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        z-index: 2;
    }

    .product-item:hover .view-icon {
        opacity: 1;
    }

    .view-icon:hover {
        background-color: #007bff;
        text-decoration: none;
    }

    .view-icon i {
        font-size: 16px;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .view-icon:hover i {
        color: white;
    }

   
    /* Category Image Section */
    .card {
        background-color:white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        text-align: center;
        cursor: pointer;
        width: 120px;
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
    }

    .card img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
    }

    .card img:hover {
        transform: scale(1.1);
    }

    .card-title {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        margin-top:0px;
    }

    /* Slider Container */
    .product-slider-container {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    /* Slider itself */
    .product-slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .product-slide {
        display: flex;
        justify-content: space-between;
        flex: 0 0 100%;
    }

    /* Each product item column */
    .product-item {
        text-align: center;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .product-item:hover {
        transform: scale(1.05); /* Slight zoom effect on hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for better focus */
    }

    /* Ensuring image size consistency */
    .product-item img {
        width: 100%;
        height: 200px; /* Fixed height for the images */
        object-fit: cover; /* Ensure the image covers the area without distortion */
        border-radius: 8px;
        display: block;
        margin: 0 auto; /* Center the image */
    }

    /* View Button Styling */
    .view-button {
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .view-button:hover {
        background-color: #0056b3;
    }

    /* Centering radio buttons */
    .slider-radio-buttons {
        text-align: center;
        margin-top: 20px;
    }

    .slider-radio {
        margin: 0 10px;
        cursor: pointer;
    }

    /* Container for products */
    .container {
        max-width: 1200px;
        width: 100%;
        padding: 0; /* Removed padding */
    }

    /* Modern Category Section Styling */
    .category-section {
        padding: 2rem 0;
        background-color: #ffffff;
    }

    .category-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Category Title Styling */
    .category-title {
        font-family: 'Righteous', cursive;
        text-align: center;
        margin-bottom: 1rem;
        font-size: 2.8rem;
        position: relative;
        background: linear-gradient(45deg, #007bff, #00ffbb, #007bff);
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: gradient 3s linear infinite;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .category-title:hover {
        letter-spacing: 4px;
        text-shadow: 
            0 0 10px rgba(0,123,255,0.5),
            0 0 20px rgba(0,123,255,0.3),
            0 0 30px rgba(0,123,255,0.1);
        transform: scale(1.05);
    }

    .category-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        width: 60px;
        height: 3px;
        background: linear-gradient(45deg, #007bff, #00ffbb);
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .category-title:hover::after {
        width: 120px;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .category-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        height: 200px;
        margin-bottom: 20px;
        cursor: pointer;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .category-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-decoration: none;
        display: block;
    }

    .category-image {
        width: 100%;
        height: 150px;
        object-fit: contain;
        padding: 15px;
        transition: all 0.3s ease;
    }

    .category-card:hover .category-image {
        transform: scale(1.08);
    }

    .category-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        padding: 15px;
        transition: all 0.3s ease;
    }

    .category-name {
        color: #ffffff;
        font-size: 1rem;
        font-weight: 500;
        margin: 0;
        text-align: center;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }

    .category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,123,255,0.1);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .category-card:hover .category-overlay {
        opacity: 1;
    }

    /* Responsive Grid */
    .category-row {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .category-col {
        width: 16.666%; /* 6 columns */
        padding: 10px;
    }

    /* Responsive Breakpoints */
    @media (max-width: 1200px) {
        .category-col {
            width: 20%; /* 5 columns */
        }
    }

    @media (max-width: 992px) {
        .category-col {
            width: 25%; /* 4 columns */
        }
    }

    @media (max-width: 768px) {
        .category-col {
            width: 33.333%; /* 3 columns */
        }
    }

    @media (max-width: 576px) {
        .category-col {
            width: 50%; /* 2 columns */
        }
        .category-card {
            height: 180px;
        }
        .category-image {
            height: 130px;
        }
    }

    /* Add/Update these CSS styles */
    .product-slider-item {
        position: relative;
        overflow: hidden;
    }

    .view-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        z-index: 2;
    }

    .product-slider-item:hover .view-icon {
        opacity: 1;
    }

    .view-icon:hover {
        background-color: #007bff;
        text-decoration: none;
    }

    .view-icon i {
        font-size: 16px;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .view-icon:hover i {
        color: white;
    }

    /* Remove all slider-related styles and replace with this product grid styling */
    .product-grid {
        padding: 2rem 0;
        background-color: #ffffff;
    }

    .product-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .product-title {
        font-family: 'Righteous', cursive;
        text-align: center;
        margin-bottom: 2rem;
        font-size: 2.8rem;
        position: relative;
        background: linear-gradient(45deg, #007bff, #00ffbb, #007bff);
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: gradient 3s linear infinite;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .product-row {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .product-col {
        width: 20%;
        padding: 10px;
    }

    .product-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        height: 350px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .product-image-container {
        height: 250px;
        width: 100%;
        position: relative;
        overflow: hidden;
        background: #fff;
        padding: 15px;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .product-details {
        padding: 15px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: #fff;
    }

    .product-name {
        font-size: 1.1rem;
        color: #007bff;
        margin: 0 0 10px 0;
        font-weight: 600;
        line-height: 1.4;
        padding: 0 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 44px;
        transition: color 0.3s ease;
    }

    .product-name:hover {
        color: #0056b3;
    }

    .product-price {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        margin-top: 5px;
    }

    .view-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .product-card:hover .view-icon {
        opacity: 1;
    }

    /* Responsive Breakpoints */
    @media (max-width: 1200px) {
        .product-col {
            width: 25%;
        }
    }

    @media (max-width: 992px) {
        .product-col {
            width: 33.333%;
        }
    }

    @media (max-width: 768px) {
        .product-col {
            width: 50%;
        }
    }

    @media (max-width: 576px) {
        .product-col {
            width: 100%;
        }
    }
</style>
</head>
<body>

<!-- Header -->
<header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder"></h1>
            <p class="lead fw-normal text-white-50 mb-0"> <br><br><br><br></p>
        </div>
    </div>
</header>

<?php
// Database connection (replace with your connection code)
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "pet_shop_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$products = $conn->query("SELECT p.*, i.price 
    FROM products p 
    LEFT JOIN inventory i ON p.id = i.product_id 
    WHERE p.status = 1 
    ORDER BY RAND()");
?>

<!-- Remove all category-related CSS -->
<style>
/* Keep only product-related styles */
.product-grid {
    padding: 2rem 0;
    background-color: #ffffff;
}

.product-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 15px;
}

.product-title {
    font-family: 'Righteous', cursive;
    text-align: center;
    margin-bottom: 2rem;
    font-size: 2.8rem;
    position: relative;
    background: linear-gradient(45deg, #007bff, #00ffbb, #007bff);
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: gradient 3s linear infinite;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.product-row {
    display: flex;
    flex-wrap: wrap;
    margin: -10px;
}

.product-col {
    width: 20%;
    padding: 10px;
}

.product-card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: 350px;
    margin-bottom: 20px;
}

.product-image-container {
    height: 250px;
    width: 100%;
    position: relative;
    overflow: hidden;
    background: #fff;
    padding: 15px;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.product-details {
    padding: 15px;
    text-align: center;
    background: #fff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100px;
}

.product-name {
    font-size: 1.1rem;
    color: #007bff;
    margin: 0 0 10px 0;
    font-weight: 600;
    line-height: 1.4;
    padding: 0 10px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    height: 44px;
    transition: color 0.3s ease;
}

.product-name:hover {
    color: #0056b3;
}

.product-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    margin-top: 5px;
}

/* Responsive styles */
@media (max-width: 1200px) {
    .product-col { width: 25%; }
}
@media (max-width: 992px) {
    .product-col { width: 33.333%; }
}
@media (max-width: 768px) {
    .product-col { width: 50%; }
}
@media (max-width: 576px) {
    .product-col { width: 100%; }
}
</style>

<!-- Remove the category section and keep only the products section -->
<section class="product-grid">
    <div class="product-container">
        <h2 class="product-title">Our Products</h2>
        <div class="product-row">
            <?php
            if ($products->num_rows > 0) {
                while ($row = $products->fetch_assoc()) {
                    $upload_path = 'uploads/product_' . $row['id'];
                    $images = [];
                    if (is_dir($upload_path)) {
                        $fileO = scandir($upload_path);
                        for ($i = 2; $i < count($fileO); $i++) {
                            $images[] = "uploads/product_" . $row['id'] . "/" . $fileO[$i];
                        }
                    }
                    if (count($images) > 0):
            ?>
                    <div class="product-col">
                        <div class="product-card">
                            <div class="product-image-container">
                                <img class="product-image" src="<?php echo $images[0] ?>" alt="Product Image" />
                                <a href=".?p=view_product&id=<?php echo md5($row['id']) ?>" class="view-icon">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <?php echo htmlspecialchars($row['product_name']); ?>
                                </h3>
                                <div class="product-price">
                                    <?php 
                                    if(isset($row['price']) && is_numeric($row['price']) && $row['price'] > 0) {
                                        echo '₹' . number_format($row['price'], 2);
                                    } else {
                                        echo 'Contact for price';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    endif;
                }
            } else {
                echo "<p class='text-center w-100'>No products found.</p>";
            }
            ?>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
