<?php
include 'db.php';  // Include the database connection

// Get the blog ID from the query string
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];

    // SQL query to fetch the specific blog post
    $sql = "SELECT * FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $blog_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
    } else {
        echo "Blog post not found.";
        exit;
    }
} else {
    echo "No blog ID provided.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog['title']; ?></title>
    <!-- Link to Google Fonts (example: Roboto) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Updated Google Fonts with Playfair Display for headings and Source Sans 3 for body text -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Source+Sans+3:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans 3', sans-serif;
            line-height: 1.7;
            margin: 0;
            padding: 40px 20px;
            background-color: #f8f9fa;
            color: #2c3e50;
        }
        .blog-post {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 0;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        .blog-post:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }
        .image-container {
            position: relative;
            width: 100%;
            height: 450px;
            overflow: hidden;
        }
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .image-container:hover img {
            transform: scale(1.05);
        }
        .content-wrapper {
            padding: 2.5rem;
        }
        .blog-header {
            position: relative;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f0f2f5;
        }
        .blog-title {
            font-family: 'Merriweather', serif;
            font-size: 2.25rem;
            color: #1a202c;
            line-height: 1.3;
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }
        .blog-title:hover {
            color: #3182ce;
        }
        .meta-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.95rem;
            color: #64748b;
        }
        .meta-info span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .meta-info i {
            font-size: 1.1rem;
        }
        .blog-description {
            background-color: #f8fafc;
            padding: 2rem;
            border-radius: 15px;
            margin: 1.5rem 0;
            position: relative;
        }
        .blog-description::before {
            content: '"';
            position: absolute;
            top: -0.5rem;
            left: 1rem;
            font-size: 4rem;
            color: #e2e8f0;
            font-family: 'Georgia', serif;
            line-height: 1;
        }
        .blog-description p {
            font-size: 1.1rem;
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            position: relative;
        }
        .blog-description p:last-child {
            margin-bottom: 0;
        }
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding: 0 2rem 2rem;
        }
        .watch-video-btn, 
        .read-more {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.875rem 1.75rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }
        .watch-video-btn {
            background-color: #3182ce;
            color: white;
        }
        .watch-video-btn:hover {
            background-color: #2c5282;
            transform: translateY(-2px);
        }
        .read-more {
            background-color: #e2e8f0;
            color: #4a5568;
        }
        .read-more:hover {
            background-color: #cbd5e0;
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            .blog-post {
                margin: 1rem;
            }
            .image-container {
                height: 300px;
            }
            .content-wrapper {
                padding: 1.5rem;
            }
            .blog-title {
                font-size: 1.75rem;
            }
            .blog-description {
                padding: 1.5rem;
            }
            .action-buttons {
                flex-direction: column;
                padding: 0 1.5rem 1.5rem;
            }
        }
        .loading-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #3182ce;
            animation: spin 1s ease-in-out infinite;
            display: none;
        }
        @keyframes spin {
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
</head>
<body>

<div class="blog-post">
    <div class="image-container">
        <?php
        $image_url = "uploads/" . $blog['image_url'];
        if (file_exists($image_url)) {
            echo "<img id='blogImage' src='$image_url' alt='" . $blog['title'] . "' />";
        } else {
            echo "<img id='blogImage' src='uploads/default.jpg' alt='No Image Available' />";
        }
        ?>
    </div>

    <div class="content-wrapper">
        <div class="blog-description">
            <?php echo nl2br($blog['description']); ?>
        </div>
    </div>
</div>

<div class="action-buttons">
    <?php if ($blog['link']): ?>
        <a href="#" class="watch-video-btn" id="watchVideoBtn">
            <i class="fas fa-play-circle"></i>&nbsp; Watch Video
        </a>
    <?php endif; ?>
    <a href="http://localhost/pet_shop/blog.php" class="read-more">
        <i class="fas fa-arrow-left"></i>&nbsp; Back to Blog List
    </a>
</div>

<script>
    // JavaScript function to show the video when the image is clicked and hide the image
    function showVideo() {
        var image = document.getElementById("blogImage");
        var videoContainer = document.getElementById("videoContainer");

        // Hide the image
        image.style.display = "none";
        
        // Show the video container
        videoContainer.style.display = "block";
    }
</script>

</body>
</html>

<?php
// Function to extract the YouTube video ID from the URL
function extractYouTubeId($url) {
    $regExp = "/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|\S+\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/";
    preg_match($regExp, $url, $matches);
    return $matches ? $matches[1] : null;
}

$conn->close();
?>
