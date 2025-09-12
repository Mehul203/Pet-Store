<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Store - Social Media Help</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    .social-media-help {
      padding: 60px 0;
      text-align: center;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
      margin: 20px;
      background-color: white;
    }

    .social-media-help h2 {
      margin-bottom: 30px;
      font-size: 2.2rem;
      font-weight: 700;
      color: #2c3e50;
      animation: fadeInDown 1s ease;
    }

    .help-icon {
      margin-bottom: 30px;
      animation: bounce 2s infinite;
    }

    .social-media-icons {
      margin: 30px 0;
      animation: fadeIn 1s ease;
    }

    .social-media-icons a {
      display: inline-block;
      margin: 0 20px;
      transition: all 0.3s ease;
    }

    .social-media-icons a:hover {
      transform: scale(1.2) rotate(5deg);
    }

    .social-media-icons img {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .help-icon img {
      width: 120px;
      height: auto;
    }

    .back-home-btn {
      margin-top: 40px;
      background-color: #3498db;
      color: white;
      border: none;
      padding: 12px 30px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      border-radius: 50px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
      animation: fadeInUp 1s ease;
    }

    .back-home-btn:hover {
      background-color: #2980b9;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
    }

    /* Animations */
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>

  <!-- Add Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

  <!-- Social Media Help Section -->
  <div class="social-media-help">
    <div class="container">
      <!-- Help Icon centered -->
      <div class="help-icon">
        <img src="https://img.icons8.com/?size=100&id=2908&format=png&color=000000" alt="Help Icon">
      </div>

      <h2>Need Help? Reach Out to Us on Social Media!</h2>

      <div class="social-media-icons">
        <!-- Facebook Icon Image -->
        <a href="https://www.facebook.com" target="_blank" title="Facebook">
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
        </a>
        
        <!-- Instagram Icon Image -->
        <a href="https://www.instagram.com/m_b.solanki203" target="_blank" title="Instagram">
          <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
        </a>
        
        <!-- WhatsApp Icon Image -->
        <a href="https://wa.me/919512149013?text=Help%20me%20for%20Royal%20Pet%20Shop%20Website" target="_blank" title="WhatsApp">
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
        </a>
        
        <!-- Telegram Icon Image -->
        <a href="https://T.me/@Solanki203" target="_blank" title="Telegram">
          <img src="https://img.icons8.com/?size=100&id=63306&format=png&color=000000" alt="Telegram">
        </a>
      </div>

      <!-- Back Home Button -->
      <button class="back-home-btn" onclick="window.location.href='index.php'">Back to Home</button>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
