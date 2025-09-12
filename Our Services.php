<?php
// PHP part: if needed, you can handle form submission here.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // For now, just echo the message. You can add database logic or email functionality.
    echo "<script>alert('Thank you, $name! We have received your message.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Store - Our Services</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    
    header {
      background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/bg_1.jpg');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 120px 0;
      text-align: center;
    }

    /* Removed redundant overlay since we're using gradient */
    
    header h1 {
      color: #ffffff;
      font-size: 4rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 3px;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    header p {
      color: #ffd700;  /* Changed to a warmer gold color */
      font-size: 1.8rem;
      font-weight: 400;
      margin-bottom: 0;
    }

    .card {
      margin-bottom: 30px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 20px rgba(0,0,0,0.15);
    }

    .card img {
      height: 250px;  /* Increased height */
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .card:hover img {
      transform: scale(1.05);
    }

    .card-body {
      padding: 2rem;
      background: white;
    }

    .card-title {
      font-size: 1.75rem;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 1rem;
    }

    .card-text {
      font-size: 1.1rem;
      color: #555;
      line-height: 1.7;
      margin-bottom: 1.5rem;
    }

    .btn-primary {
      background-color: #4a90e2;
      border: none;
      padding: 12px 30px;
      font-weight: 500;
      border-radius: 30px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #357abd;
      transform: scale(1.05);
      box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
    }

    .container {
      margin-top: 60px;
      margin-bottom: 60px;
    }

    .back-home {
      padding: 20px 0;
      margin-top: 40px;
    }
    
    .back-home a {
      color: #2c3e50;
      font-size: 1.1rem;
      font-weight: 500;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    
    .back-home a:hover {
      color: #4a90e2;
      transform: translateX(-5px);
    }
  </style>
  <!-- Add Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header>
    <h1> Pet Store</h1>
    <p>Your Pet's Best Friend</p>
  </header>

  <!-- Our Services Section -->
  <div class="container my-5">
    <h2 class="text-center mb-4">Our Services</h2>
    
    <div class="row">
      <!-- Pet Grooming Card -->
      <div class="col-md-4">
        <div class="card">
          <img src="img/Grooming Service.jpg" class="card-img-top" alt="Pet Grooming">
          <div class="card-body">
            <h5 class="card-title">Pet Grooming</h5>
            <p class="card-text">Professional grooming services including bath, haircut, nail trimming, and ear cleaning.</p>
            <button class="btn btn-primary" onclick="showAlert('Pet Grooming')">Learn More</button>
          </div>
        </div>
      </div>

      <!-- Pet Food & Supplies Card -->
      <div class="col-md-4">
        <div class="card">
          <img src="img/Pet Supplies.jpg" class="card-img-top" alt="Pet Food & Supplies">
          <div class="card-body">
            <h5 class="card-title">Pet Food & Supplies</h5>
            <p class="card-text">A wide variety of high-quality food, treats, and supplies for your pets.</p>
            <button class="btn btn-primary" onclick="showAlert('Pet Food & Supplies')">Learn More</button>
          </div>
        </div>
      </div>

      <!-- Adoption Services Card -->
      <div class="col-md-4">
        <div class="card">
          <img src="img/feature.jpg" class="card-img-top" alt="Adoption Services">
          <div class="card-body">
            <h5 class="card-title">Adoption Services</h5>
            <p class="card-text">Connect with pets looking for their forever home.</p>
            <button class="btn btn-primary" onclick="showAlert('Adoption Services')">Learn More</button>
          </div>
        </div>
      </div>
    </div>

    <div class="back-home">
        <a href="index.php" class="text-decoration-none">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JavaScript -->
  <script>
    // Function to show an alert when clicking the "Learn More" button
    function showAlert(serviceName) {
      alert("You selected the " + serviceName + " service!");
    }
  </script>
  

</body>
</html>
