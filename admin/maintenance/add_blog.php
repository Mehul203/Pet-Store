<?php
// Start the session at the very top of the page

include 'db.php';  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'] ?? NULL;

    // Get the uploaded image details
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_error = $image['error'];
    $image_size = $image['size'];

    // Check if there was no error with the image upload
    if ($image_error === 0) {
        // Validate image size (maximum 2MB)
        if ($image_size < 2097152) {  // 2MB in bytes
            // Generate a unique name for the image to avoid overwriting
            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_new_name = uniqid('', true) . "." . $image_extension;

            // Specify the upload directory
            $upload_directory = "C:/xampp/htdocs/pet_shop/uploads/";

            // Ensure the uploads directory exists (create if not)
            if (!is_dir($upload_directory)) {
                mkdir($upload_directory, 0777, true);
            }

            // Move the uploaded image to the uploads folder
            $image_path = $upload_directory . $image_new_name;
            move_uploaded_file($image_tmp_name, $image_path);

            // Save only the filename in the database (not the full path)
            $image_file_name = $image_new_name;

            // Insert the blog data into the database
            $sql = "INSERT INTO blogs (title, description, image_url, link) 
                    VALUES ('$title', '$description', '$image_file_name', '$link')";

            if ($conn->query($sql) === TRUE) {
                // Set a session flag to display the success message
                $_SESSION['success_message'] = 'New blog post created successfully.';
                // Redirect to avoid re-posting form data on refresh
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Image size is too large. Maximum allowed size is 2MB.";
        }
    } else {
        echo "There was an error uploading the image.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Font Awesome for success icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* Reset margins and padding for all elements */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Success and Error Message Styling */
        .alert {
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            position: fixed; /* Fix the position to the right */
            top: 20px;
            right: 20px; /* Align to the right side */
            z-index: 1000; /* Ensure the message is on top */
            width: auto;
            max-width: 300px;
            opacity: 1;
            transition: opacity 1s ease-in-out; /* Fade out effect */
        }

        .alert.success {
            background-color:blue;
            color: white;
        }

        .alert.error {
            background-color: #F44336;
            color: white;
        }

        .alert i {
            margin-right: 10px;
        }

        .alert.success i {
            color: white;
        }

        .alert.error i {
            color: white;
        }

        /* Navigation bar styling */
        .navbar {
            background-color: #333;
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
            padding: 10px;
            z-index: 999;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar-right {
            float: right;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
           
        }

        h3 {
            text-align: center;
            color: white;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: white;
            font-size: 18px;
        }

        input[type="text"], input[type="file"], textarea {
            width: 300px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            border-color:white;
            background-color:rgba(0, 0, 0, 0.1);
            font-size: 16px;
            box-sizing: border-box;
            height: 37px;
        }

        textarea {
            resize: vertical;
            height: 37px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 200px;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="#">Home</a>
        <a href="#" class="navbar-right">Logout</a>
    </div>

    <h3>Add Blog Post</h3>

    <!-- Display success message if the session flag is set -->
    <?php 
    if (isset($_SESSION['success_message'])) {
        echo '<div id="successMessage" class="alert success"><i class="fas fa-check-circle"></i>' . $_SESSION['success_message'] . '</div>';
        // Clear the success message flag after displaying
        unset($_SESSION['success_message']);
    }
    ?>

    <!-- HTML Form for Adding Blog -->
    <center>
        <form method="POST" action="http://localhost/pet_shop/admin/?page=maintenance/add_blog" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="image">Image Upload:</label>
            <input type="file" id="image" name="image" required>

            <label for="link">YouTube Video Link (optional):</label>
            <input type="text" id="link" name="link">
            <br>
            <input type="submit" value="Add Blog Post">
        </form>
    </center>

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
    <?php
// Include the database connection
include('manage_blog.php');

// Your code here
?>


</body>
</html>
