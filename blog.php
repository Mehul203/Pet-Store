<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/header.php') ?>
<body>
<?php require_once('inc/topBarNav.php') ?>
<?php $page = isset($_GET['p']) ? $_GET['p'] : 'home'; ?>

<?php  
include 'db.php';  // Include the database connection

$sql = "SELECT * FROM blogs ORDER BY created_at DESC";  // Get all blogs ordered by date
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Full height setup */
        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        /* Ensure the container fills up available space */
        .container {
            flex-grow: 1;
        }

        /* Container for blog posts */
        .blog-post-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Create 4 equal columns */
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-post-card {
            display: flex;
            flex-direction: column;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 100%;
        }

        .blog-post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .blog-post-card h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .blog-post-card p {
            color: #555;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .image-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .image-container img:hover {
            transform: scale(1.05);
        }

        .read-more {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        /* Modal Background */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
            display: flex; /* Use flexbox to center the modal */
            justify-content: center; /* Horizontally center */
            align-items: center; /* Vertically center */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px; /* Maximum width of the modal */
            position: relative;
            text-align: center; /* Ensure the iframe inside modal is aligned */
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* YouTube Player Styles */
        #videoPlayer iframe {
            width: 100%; /* Ensure iframe takes full width inside modal */
            height: 450px; /* Set the height of the video */
            border-radius: 8px;
        }

        @media (max-width: 600px) {
            #videoPlayer iframe {
                height: 300px; /* Make video smaller on small screens */
            }
        }

        @media (max-width: 1200px) {
            .blog-post-container {
                grid-template-columns: repeat(3, 1fr); /* 3 columns for medium screens */
            }
        }

        @media (max-width: 900px) {
            .blog-post-container {
                grid-template-columns: repeat(2, 1fr); /* 2 columns for smaller screens */
            }
        }

        @media (max-width: 600px) {
            .blog-post-container {
                grid-template-columns: 1fr; /* 1 column for very small screens */
            }
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
            padding: 20px;
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

        /* Footer Styling */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 16px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        footer .footer-logo {
            font-size: 24px;
            font-weight: bold;
        }

        footer .social-links a {
            margin: 0 10px;
            font-size: 18px;
        }

        footer .social-links a:hover {
            color: #3498db; /* Adjust the hover color */
        }

        footer p {
            font-size: 14px;
            margin-top: 10px;
        }

        /* Ensure footer stays at the bottom of the page */
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1; /* Push content to the top */
        }

    </style>

</head>
<body>
<div class="container pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Pet Blog</h4>
        <h1 class="display-4 m-0"><span class="text-primary">Updates</span> From Blog</h1>
    </div>

    <div class="blog-post-container">
        <?php
        if ($result->num_rows > 0) {
            // Loop through each blog post
            while ($row = $result->fetch_assoc()) {
                echo "<div class='blog-post-card'>";
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p>" . substr($row['description'], 0, 100) . "...</p>";

                // Construct the image URL using the filename stored in the database
                $image_url = "uploads/" . $row['image_url'];

                // Check if the image file exists before displaying
                if (file_exists($image_url)) {
                    // Check if a YouTube video link is provided
                    if ($row['link']) {
                        // If a YouTube link is provided, make the image clickable and trigger the modal
                        echo "<a href='#' class='video-modal' data-video-url='" . $row['link'] . "'>";
                        echo "<div class='image-container'><img src='" . $image_url . "' alt='" . $row['title'] . "' /></div>";
                        echo "</a>";
                    } else {
                        // If no link, display the image normally
                        echo "<div class='image-container'><img src='" . $image_url . "' alt='" . $row['title'] . "' /></div>";
                    }
                } else {
                    // Show a default image if no image exists
                    echo "<div class='image-container'><img src='uploads/default.jpg' alt='No Image Available' /></div>";
                }

                // Link to the full blog post
                echo "<a href='single_blog.php?id=" . $row['id'] . "' class='read-more'>Read More</a>";
                echo "</div>";  // End of blog-post-card
            }
        } else {
            echo "No blog posts found.";
        }

        $conn->close();
        ?>
    </div>
</div>

<!-- Modal Structure -->
<div id="videoModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="videoPlayer"></div>
    </div>
</div>

<script>
    // Get modal element
    var modal = document.getElementById('videoModal');

    // Get the modal close button
    var closeButton = document.getElementsByClassName('close')[0];

    // Get all video modal trigger elements
    var videoModals = document.getElementsByClassName('video-modal');

    // Open modal when clicking on image
    Array.from(videoModals).forEach(function(modalTrigger) {
        modalTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            var videoUrl = this.getAttribute('data-video-url');
            var videoId = extractYouTubeId(videoUrl);

            if (videoId) {
                openModal(videoId);
            }
        });
    });

    // Close modal when clicking on 'X'
    closeButton.onclick = function() {
        closeModal();
    }

    // Close modal when clicking outside of the modal content
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }

    // Extract YouTube video ID from URL
    function extractYouTubeId(url) {
        var regExp = /^.*(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|\S+\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        var match = url.match(regExp);
        return match ? match[1] : null;
    }

    // Open Modal with YouTube Video
    function openModal(videoId) {
        var iframe = document.createElement('iframe');
        iframe.src = "https://www.youtube.com/embed/" + videoId + "?autoplay=1";
        iframe.frameBorder = "0";
        iframe.allow = "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture";
        iframe.allowFullscreen = true;

        // Add the iframe to the modal content
        document.getElementById('videoPlayer').innerHTML = "";
        document.getElementById('videoPlayer').appendChild(iframe);

        modal.style.display = "flex"; // Use 'flex' to ensure modal stays centered
    }

    // Close Modal and remove video
    function closeModal() {
        modal.style.display = "none";
        document.getElementById('videoPlayer').innerHTML = ""; // Clear iframe content
    }
</script>

<?php require_once('inc/footer.php') ?>
</body>
</html>
