<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = "";     // Default for XAMPP (no password)
$dbname = "feedback_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message variable
$message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    // Insert feedback into database
    $sql = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Feedback submitted successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
<?php if (!empty($message)) { echo "<div class='alert alert-success'>$message</div>"; } ?>
