<?php
include 'db.php';  // Include the database connection

// Get the blog ID from the URL
$blog_id = $_GET['id'] ?? 0;  // Default to 0 if no id is provided

// Get the blog details from the database
$sql = "SELECT * FROM blogs WHERE id = $blog_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the blog data
    $row = $result->fetch_assoc();
    echo "<div class='single-blog-post'>";
    echo "<h2>" . $row['title'] . "</h2>";
    echo "<p>" . $row['description'] . "</p>";

    // Display the image
    $image_url = "uploads/" . $row['image_url'];
    if (file_exists($image_url)) {
        // Check if a YouTube video link is provided
        if ($row['link']) {
            // If a YouTube link is provided, make the image clickable
            echo "<a href='" . $row['link'] . "' target='_blank' class='blog-image-link'>";
            echo "<img src='" . $image_url . "' alt='" . $row['title'] . "' class='blog-image'/>";
            echo "</a>";
        } else {
            // If no link, display the image normally
            echo "<img src='" . $image_url . "' alt='" . $row['title'] . "' class='blog-image'/>";
        }
    } else {
        // Show a default image if no image exists
        echo "<img src='uploads/default.jpg' alt='No Image Available' class='blog-image'/>";
    }

    echo "</div>";
} else {
    echo "Blog post not found.";
}

$conn->close();
?>

<!-- Back Button -->
<div style="text-align: center; margin-top: 20px;">
    <a href="blog_list.php" style="text-decoration: none; background-color: #007BFF; color: white; padding: 10px 20px; border-radius: 5px; font-size: 16px; display: inline-block;">
        Back to Blog List
    </a>
</div>

<style>
    /* Style for the Blog Post Container */
    .single-blog-post {
        width: 250px;  /* Smaller width for the card */
        margin: 15px auto;
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover effect for the card */
    .single-blog-post:hover {
        transform: translateY(-5px);  /* Slight lift effect */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);  /* Increase shadow on hover */
    }

    /* Title Style */
    .single-blog-post h2 {
        font-size: 1.2em;  /* Smaller font size for the title */
        color: #333;
        margin-bottom: 10px;
        text-align: center;
    }

    /* Description Style */
    .single-blog-post p {
        font-size: 0.9em;  /* Smaller font size for the description */
        color: #666;
        line-height: 1.4;
        text-align: center;
        margin-bottom: 10px;
    }

    /* Styling for the Blog Image */
    .blog-image {
        width: 100%;  /* Full width of the card */
        height: 160px;  /* Smaller height for the image */
        object-fit: cover;  /* Ensure the image covers the space properly */
        border-radius: 6px;  /* Rounded corners for the image */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover effect on image */
    .blog-image:hover {
        transform: scale(1.05);  /* Slightly enlarge the image on hover */
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);  /* Increase shadow effect on hover */
    }

    /* Optional: Style the clickable image link if there’s a YouTube link */
    .blog-image-link {
        display: inline-block;
        text-decoration: none;
    }
</style>
