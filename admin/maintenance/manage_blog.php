<?php
// Start the session to store and retrieve session variables
include 'db.php';  // Include the database connection

// Initialize variables for success and error messages
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $blog_id = $_POST['id'];

    // Prepare and execute the delete query
    $delete_sql = "DELETE FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param('i', $blog_id);  // 'i' is the type for integer
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Store the success message in the session
        $_SESSION['success_message'] = "Blog post deleted successfully.";
    } else {
        // Store the error message in the session
        $_SESSION['error_message'] = "Error: Could not delete the blog post.";
    }

    $stmt->close();  // Close the statement

    // Redirect to refresh the page and remove the message
    exit();  // Stop further execution
}

// Fetch all blogs from the database
$sql = "SELECT * FROM blogs";  // Modify this if your table name is different
$result = $conn->query($sql);

// Clear the session message after displaying it
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);  // Clear the session message
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);  // Clear the session message
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h3 {
            text-align: center;
            color: white;
            padding:20px;
        }

        .blog-posts {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Responsive grid */
            gap: 15px;
            margin-top: 20px;
            padding: 0 20px;
        }

        .blog-post {
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .blog-post h2 {
            font-size: 16px;
            margin: 0;
            padding-right: 30px; /* Space for delete button */
        }

        .blog-post p {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        /* Delete button style */
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            color: red;
            font-size: 20px;
            cursor: pointer;
        }

        /* Hover effect for delete button */
        .delete-btn:hover {
            color: darkred;
        }

        /* Success message style */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-message i {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Error message style */
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-message i {
            margin-right: 10px;
            font-size: 18px;
        }

        /* New CSS class for the 'No blog posts found' message */
        .no-posts-message {
            color: #ff0000;  /* Red color */
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h3>Manage Blog Posts</h3>

<!-- Display success message if blog post was deleted successfully -->
<?php if ($success_message): ?>
    <div class="success-message">
        <i class="fas fa-check-circle"></i>
        <?php echo $success_message; ?>
    </div>
<?php endif; ?>

<!-- Display error message if there was an issue deleting the blog post -->
<?php if ($error_message): ?>
    <div class="error-message">
        <i class="fas fa-exclamation-triangle"></i>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>

<!-- Blog List -->
<div class="blog-posts">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='blog-post'>";
            echo "<h2>" . $row['title'] . "</h2>";
            
            // Display delete button as an icon
            echo "<form method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
            echo "<button type='submit' class='delete-btn'><i class='fas fa-trash-alt'></i></button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-posts-message'>No blog posts found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<!-- JavaScript for auto-refresh (after 10 seconds) -->
<script>
        // Check if success message is visible
        window.onload = function() {
            const successMessage = document.getElementById("successMessage");
            if (successMessage) {
                // Remove success message after 3 seconds
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 3000);  // 3000 milliseconds = 3 seconds
            }
        };
    </script>

</body>
</html>
